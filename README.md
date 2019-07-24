# CodeGenerator
[![Build Status](https://travis-ci.org/OpenClassrooms/CodeGenerator.svg?branch=master)](https://travis-ci.org/OpenClassrooms/CodeGenerator)
[![SensioLabsInsight](https://insight.symfony.com/projects/e91d65d8-55e2-4b66-8649-1bfaf79b67d8/mini.svg)](https://insight.symfony.com/account/widget?project=e91d65d8-55e2-4b66-8649-1bfaf79b67d8)
[![codecov](https://codecov.io/gh/OpenClassrooms/CodeGenerator/branch/master/graph/badge.svg)](https://codecov.io/gh/OpenClassrooms/CodeGenerator)


CodeGenerator is a library who generates classes in Clean Architecture context. 

From any use case response, developers have the possibility to generate: 
- use case architecture
- Entity use case Get architecture
- Entities use case Get architecture
- ViewModel architecture
- Unit tests for each classed generated

## Installation
The easiest way to install CodeGenerator is via [composer](http://getcomposer.org/).

Create the following `composer.json` file or run the `php composer.phar install` command to install it.

```commandLine
composer require --dev openclassrooms/code-generator *
```
or
```json
{
    "require": {
        "openclassrooms/code-generator": "*"
    }
}
```
Add script in `composer.json` to create `oc_code_generator.yml` configuration used by the generator.
```json
  "scripts": {
    "post-install-cmd": [
      "OpenClassrooms\\CodeGenerator\\Scripts\\ParameterHandler::createGeneratorFileParameters"
    ],
    "post-update-cmd": [
      "OpenClassrooms\\CodeGenerator\\Scripts\\ParameterHandler::createGeneratorFileParameters"
    ]
  },
```
The script create file `oc_code_generator.yml` at the root of the project. The script will ask you interactively for parameters which are missing in the parameters file, using the value of the dist file as default value.
``` yaml
parameters:
    author:
    author_mail:
    api_dir: ApiBundle\
    app_dir: AppBundle\
    base_namespace: OC\
    stub_namespace: Doubles\OC\
    tests_base_namespace: OC\

    paginated_collection_classname: OpenClassrooms\UseCase\BusinessRules\Entities\PaginatedCollection
    use_case_classname: OpenClassrooms\UseCase\BusinessRules\Requestors\UseCase
    use_case_request_classname: OpenClassrooms\UseCase\BusinessRules\Requestors\UseCaseRequest

    paginated_use_case_response_classname: %base_namespace%BusinessRules\Responders\PaginatedUseCaseResponse
    paginated_use_case_response_builder_classname: %base_namespace%BusinessRules\Responders\PaginatedUseCaseResponseBuilder
    use_case_response_classname:  %base_namespace%BusinessRules\Responders\UseCaseResponse
    pagination_classname:  %base_namespace%BusinessRules\Gateways\Pagination
```

## Usage
### Basic execution
To list all possibilities: 
``` 
php bin/code-generator
```
To generate view model architecture: 
``` 
php bin/code-generator code-generator:view-models useCaseResponseClassName
```
To generate generic use case architecture: 
``` 
php bin/code-generator code-generator:generic-use-case
or  
php bin/code-generator code-generator:generic-use-case Domain\\SubDomain UseCaseName
```
To generate generic entity use case get and get all architecture: 
``` 
php bin/code-generator code-generator:get-entity-use-case 
or  
php bin/code-generator code-generator:get-entities-use-case
```  
### Extensions
To generate without tests:
```
php bin/code-generator code-generator:view-models useCaseResponseClassName --no-test
```
To generate view model architecture tests only if view model classes already exist: 
``` 
php bin/code-generator code-generator:view-models useCaseResponseClassName --tests-only
```
To dump preview for view model classes: 
``` 
php bin/code-generator code-generator:view-models useCaseResponseClassName --dump
```
## How to create a new generator

### To know
- A generated file is described by a skeleton, on the skeleton directory.
- A generator grabs data and sends it to the skeleton (just like a web page)
- A generator MUST generates only one file.
- A mediator is responsible to call different generators.
- A mediator can call many other mediators.
- The command MUST calls a mediator.
- Each class MUST have an interface and his implementation.
- FileObject contains all needed class information to generate a file.
- Factories are used to create FileObject from Domain and Entity name.
- Entity name and Domain are getting from ClassNameUtility trait.
- If you need another class information in your generator, use factories to create the needed FileObject.
- Some utilities classes are used for generate stub, constant and others things.
- In view model command, if the use-case response class name contains base namespace, the generator use it if needed

### Methodology

#### 1) Write the file template you want to generate 
First, you have to create twig template the expected files after generation.
#### 2) Create generator RequestDTO and generator RequestBuilder
Create class with the entity name suffixed by `RequestBuilder` , this is used as parameter in generator main method. 
#### 3) Start Generator Implementation
The main goal of the generator class is to generate the expected FileObject, but to succeed, it necessary to build other FileObject from factories and use available Utilities. 
#### 4) Create GeneratorTest
Create class with the entity name suffixed by `GeneratorTest` and the related stub class (entity name suffixed by `FileObjectStub1`). The stub MUST contains expected values to compare with the actual object.
#### 5) Create skeletonModel and SkeletonModelAssembler
Create two classes both prefixed by the entity name:
- Firstly, an abstract class `SkeletonModel`,
- Secondly `SkeletonModelAssembler`,
Both are used to create the object which will be used in the template.
#### 6) Create mediator or add generator in existing mediator
The command uses a mediator pattern to generate classes by functional group. 
Add the new generator in the concerned group and update the mediator config.
#### 7) Create config files and update services.xml
Create a new `.xml` file for the generator and add it in `src/Ressources/config/service.xml`.
#### 8) Create the command if it does not exist
Create your command in `src/Commands` and call mediator `mediate` function in the `execute` method. 

### See an example

For a practical example, check how `src/Generator/ViewModelGenerator.php` is built.
