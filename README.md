# CodeGenerator
[![Build Status](https://github.com/OpenClassrooms/CodeGenerator/workflows/CodeGenerator/badge.svg)](https://github.com/OpenClassrooms/CodeGenerator/)
[![SensioLabsInsight](https://insight.symfony.com/projects/e91d65d8-55e2-4b66-8649-1bfaf79b67d8/mini.svg)](https://insight.symfony.com/account/widget?project=e91d65d8-55e2-4b66-8649-1bfaf79b67d8)
[![codecov](https://codecov.io/gh/OpenClassrooms/CodeGenerator/branch/master/graph/badge.svg)](https://codecov.io/gh/OpenClassrooms/CodeGenerator)


CodeGenerator is a library which generates classes in a Clean Architecture context. 

From any use case response, developers have the possibility to generate: 
- Generic use case architecture
- Entity use case Get architecture
- Entities use case Get architecture
- Create Entity use case architecture
- Delete Entity use case architecture
- ViewModel architecture
- Controller and models classes
- Unit tests for each class generated

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
Setup post-install and post-update hooks in your `composer.json`'s script section,
for the `oc_code_generator.yml` default configuration to be generated.
This file is mandatory for the code generator to work.

```json
{
  "scripts": {
    "post-install-cmd": [
      "OpenClassrooms\\CodeGenerator\\Composer\\ParameterHandler::createGeneratorFileParameters"

    ],
    "post-update-cmd": [
      "OpenClassrooms\\CodeGenerator\\Composer\\ParameterHandler::createGeneratorFileParameters"
    ]
  }
}
```
The script creates a file named `oc_code_generator.yml` at the root of the project, and will ask you interactively for parameters 
which are missing in the parameters file, using the values of the dist file as default values, as follows:

```yaml
parameters:
    api_dir: 'ApiBundle\'
    app_dir: 'AppBundle\'
    base_namespace: 'OC\'
    stub_namespace: 'Doubles\OC\'
    tests_base_namespace: 'OC\'
    
    entity_util_classname: 'OC\Util\EntityUtil'
    
    security_classname: 'OpenClassrooms\UseCase\Application\Annotations\Security'
    transaction_classname: 'OpenClassrooms\UseCase\Application\Annotations\Transaction'
    use_case_classname: 'OpenClassrooms\UseCase\BusinessRules\Requestors\UseCase'
    use_case_request_classname: 'OpenClassrooms\UseCase\BusinessRules\Requestors\UseCaseRequest'
    
    paginated_collection_builder_impl: 'OpenClassrooms\UseCase\Application\Entity\PaginatedCollectionBuilderImpl'
    paginated_collection_classname: 'OC\BusinessRules\Entities\PaginatedCollection'
    paginated_collection_factory: 'OC\AppBundle\Repository\PaginatedCollectionFactory'
    paginated_use_case_response_classname: 'OC\BusinessRules\Responders\PaginatedUseCaseResponse'
    paginated_use_case_response_builder_classname: 'OC\BusinessRules\Responders\PaginatedUseCaseResponseBuilder'
    use_case_response_classname: 'OC\BusinessRules\Responders\UseCaseResponse'
    pagination_classname: 'OC\BusinessRules\Gateways\Pagination'
    
    abstract_controller : 'OC\ApiBundle\Framework\FrameworkBundle\Controller\AbstractApiController'
    collection_information : 'OC\ApiBundle\ParamConverter\CollectionInformation'

```

You may need to tweak these values depending on the project you are using the code generator in.

## Usage
### Basic execution
To list all commands: 
``` 
php bin/code-generator
```
To generate a view model architecture: 
``` 
php bin/code-generator code-generator:view-models useCaseResponseClassName
```
To generate a generic use case architecture: 
``` 
php bin/code-generator code-generator:generic-use-case
or  
php bin/code-generator code-generator:generic-use-case Domain\\SubDomain UseCaseName
```
To generate an entity CRUD use case architecture: 
```shell
# Create:
php bin/code-generator code-generator:create-entity-use-case EntityClassName
# Delete: 
php bin/code-generator code-generator:delete-entity-use-case EntityClassName
# Edit:
php bin/code-generator code-generator:edit-entity-use-case EntityClassName
# Get all:
php bin/code-generator code-generator:get-entities-use-case EntityClassName
# Get:
php bin/code-generator code-generator:get-entity-use-case EntityClassName
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

### Using the code generator in PHPStorm

You can set up External Tools entries in PHPStorm to be able to run some code generator command
from your IDE by right-clicking on classes in the project tree (e.g., an entity class).

For the generic use case generation, add an external tool entry like this:
> Program: /usr/local/bin/php
> Arguments: bin/code-generator code-generator:generic-use-case $Prompt$
> Working Directory: $ProjectFileDir$

For a get entity use case generation, add an external tool entry like this:
> Program: /usr/local/bin/php
> Arguments: bin/code-generator code-generator:get-entity-use-case $FilePath$ $Prompt$
> Working Directory: $ProjectFileDir$

Note that this will only work if the code generator is correctly 
setup in your project's `composer.json`. You may need to tweak this for your local
PHP binary path.

## How to create a new generator

### To know
- A generated file is described by a skeleton, in the skeleton directory.
- A generator grabs data and sends it to the skeleton (just like a web page).
- A generator MUST generate only one file.
- A mediator is responsible for calling different generators.
- A mediator can call many other mediators.
- The command MUST call a mediator.
- Each class MUST have an interface and its implementation.
- FileObject contains all needed class information to generate a file.
- Factories are used to create FileObject from Domain and Entity name.
- Entity name and Domain are getting from ClassNameUtility trait.
- If you need another class information in your generator, use factories to create the needed FileObject.
- Some utility classes are used to generate stubs, constants and others things.
- In view model command, if the use case response class name contains base namespace, the generator uses it when needed.

### Methodology

#### 1) Write the file templates you want to generate 
First, you have to create twig templates for the expected files after generation.
#### 2) Create generator RequestDTO and generator RequestBuilder
Create class with the entity name suffixed by `RequestBuilder` , this is used as parameter in generator main method. 
#### 3) Start Generator Implementation
The main goal of the generator class is to generate the expected FileObject, but to succeed, it is necessary to build other FileObject from factories and use available Utilities. 
#### 4) Create GeneratorTest
Create class with the entity name suffixed by `GeneratorTest` and the related stub class (entity name suffixed by `FileObjectStub1`). The stub MUST contain expected values to compare with the actual object.
#### 5) Create skeletonModel and SkeletonModelAssembler
Create two classes both prefixed by the entity name:
- Firstly, an abstract class `SkeletonModel`,
- Secondly `SkeletonModelAssembler`,
Both are used to create the object which will be used in the template.
#### 6) Create mediator or add generator in existing mediator
The command uses a mediator pattern to generate classes by functional group. 
Add the new generator in the concerned group and update the mediator config.
#### 7) Create config files and update services.xml
Create a new `.xml` file for the generator and add it in `src/Resources/config/service.xml`.
#### 8) Create the command if it does not exist
Create your command in `src/Commands` and call mediator `mediate` function in the `execute` method. 

### See an example

For a practical example, check how `src/Generator/ViewModelGenerator.php` is built.
