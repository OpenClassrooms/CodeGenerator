# CodeGenerator
[![Build Status](https://travis-ci.org/OpenClassrooms/CodeGenerator.svg?branch=master)](https://travis-ci.org/OpenClassrooms/CodeGenerator)
[![SensioLabsInsight](https://insight.symfony.com/projects/e91d65d8-55e2-4b66-8649-1bfaf79b67d8/mini.svg)](https://insight.symfony.com/account/widget?project=e91d65d8-55e2-4b66-8649-1bfaf79b67d8)
[![codecov](https://codecov.io/gh/OpenClassrooms/CodeGenerator/branch/master/graph/badge.svg)](https://codecov.io/gh/OpenClassrooms/CodeGenerator)
CodeGenerator is a library whose purpose to generate classes in clean architecture context. 
From any use-case response, developers have the possibility to generate : 
- UseCase architecture (not implemented yet)
- ViewModel architecture
- Unit test for each classed generated

## Installation
The easiest way to install CodeGenerator is via [composer](http://getcomposer.org/).

Create the following `composer.json` file and run the `php composer.phar install` command to install it.

```commandLine
composer require --dev openclassrooms/code-generator *
```

```json
{
    "require": {
        "openclassrooms/code-generator": "*"
    }
}
```
create file called `oc_code_generator.yml` at the root of your project and configure if, for example : 
``` yaml
parameters:
    base_namespace: OC\ 
    stub_namespace: Doubles\OC\
    tests_base_namespace: OC\
    api_dir: ApiBundle\
    app_dir: AppBundle\
```
<a name="install-nocomposer"/>

## Usage
### To know
- Each generator generate only one file
- Each class must have a interface and his implementation
### Basic execution
To list all possibilities : 
``` 
php bin/CodeGenerator.php
```
To generate view model architecture : 
``` 
php bin/CodeGenerator.php code-generator:viewmodels useCaseResponseClassName
```
### Specific usage
To generate view model architecture without tests : 
``` 
php bin/CodeGenerator.php code-generator:viewmodels useCaseResponseClassName --no-test
```
To generate view model architecture tests only if view model classes already exist : 
``` 
php bin/CodeGenerator.php code-generator:viewmodels useCaseResponseClassName --tests-only
```
To dump preview for view model classes: 
``` 
php bin/CodeGenerator.php code-generator:viewmodels useCaseResponseClassName --dump
```
## Create new generator

### step 1 : start Generator Implementation
The main goal of the generator class is to generate a FileObject, it is an object representation of class.
If necessary, the method generate have to  build FileObject (generate const, generate fields, generate content with Assembler object) and include it in a queue. 
``` php
# src/Generator/Domain/SubDomain

class ViewModelGenerator extends AbstractViewModelGenerator
{
    private $viewModelSkeletonModelAssembler;

    public function generate(GeneratorRequest $generatorRequest): FileObject
    {
        $viewModelFileObject = $this->buildViewModelFileObject($generatorRequest->getUseCaseResponseClassName());
        $this->insertFileObject($viewModelFileObject);

        return $viewModelFileObject;
    }
    
    private function buildViewModelFileObject(string $useCaseResponseClassName): FileObject
    {
        //create createUseCaseResponseObject from factory
        $useCaseResponseFileObject = $this->createUseCaseResponseObject($useCaseResponseClassName);
        
        //create $viewModelFileObject from factory, the parameter $useCaseResponseFileObject are used to get required factory values 
        $viewModelFileObject = $this->createViewModelObject($useCaseResponseFileObject);

        //getPublicClassFields comes from FieldObjectService used to extract class fields  
        $viewModelFileObject->setFields($this->getPublicClassFields($useCaseResponseFileObject->getClassName()));
        
        //method generateContent uses ViewModelSkeletonModelAssembler to create the file content from twig template
        $viewModelFileObject->setContent($this->generateContent($viewModelFileObject));

        return $viewModelFileObject;
    }
    
    // implement other needed methods
```
### step 2 : create GeneratorTest
Create class `ViewModelGeneratorTest` : 
``` php
# test/Generator/Domain/SubDomain

class ViewModelGeneratorTest extends AbstractViewModelGeneratorTestCase
{
    use FileObjectTestCase;

    private $request;

    private $viewModelGenerator;

    /**
     * @test
     */
    public function generate_ReturnFileObject()
    {
        $actualFileObject = $this->viewModelGenerator->generate($this->request);

        $this->assertSame(
            InMemoryFileObjectGateway::$fileObjects[$actualFileObject->getId()],
            $actualFileObject->getPath()
        );
        $this->assertFileObject(new ViewModelFileObjectStub1(), $actualFileObject);
    }
    
    // implement setUp 
```
In this part, create stub (here `ViewModelFileObjectStub1`) with excepted values to compare with the actual object  
### step 3 : create RequestDTO and RequestBuilder
The request are used as parameter in generator main method
Create class `ViewModelGeneratorRequestDTO`and his implementation (missing here): 

``` php
# src/Generator/Domain/SubDomain/DTO/Request

class ViewModelGeneratorRequestDTO implements ViewModelGeneratorRequest
{
    public $className;

    public function getUseCaseResponseClassName(): string
    {
        return $this->className;
    }
```
Create class `ViewModelGeneratorRequestBuilder` (missing here) and his implementation: 
``` php
# src/Generator/Domain/SubDomain/DTO/Request

class ViewModelGeneratorRequestBuilderImpl implements ViewModelGeneratorRequestBuilder
{
    private $request;

    public function create(): ViewModelGeneratorRequestBuilder
    {
        $this->request = new ViewModelGeneratorRequestDTO();

        return $this;
    }

    public function withClassName(string $className): ViewModelGeneratorRequestBuilder
    {
        $this->request->className = $className;

        return $this;
    }

    public function build(): ViewModelGeneratorRequest
    {
        return $this->request;
    }
```
### step 4 : create skeleton twig template
use an existing source file to create the model 
``` php
# src/Skeleton/Domain/SubDomain

<?php declare(strict_types=1);
{% include "Header.php.twig" %}

namespace {{ skeletonModel.namespace }};

use {{ skeletonModel.parentClassName }};
//list all needed namespace

/**
 * @author {{ author }} <{{ authorEmail }}>
 */
class {{ skeletonModel.shortName }} extends {{ skeletonModel.parentShortName }}
{
    // set content
}
```

### step 5 : create skeletonModel and SkeletonModelAssembler
Create abstract class `ViewModelSkeletonModel` and his implementation (missing here): 
``` php
# src/SkeletonModels/Domain/SubDomain

abstract class ViewModelSkeletonModel extends AbstractSkeletonModel
{
    public $parentClassName;

    public $parentShortName;

    public $templatePath = 'Api/ViewModels/ViewModel.php.twig';
    
    // set other parameters needed in template
}
```
Create class `ViewModeSkeletonModelAssembler` (missing here) and his implementation : 
``` php
# src/SkeletonModels/Domain/SubDomain/Impl

class ViewModeSkeletonModelAssemblerImpl implements ViewModelSkeletonModelAssembler
{
    public function create($neededFileObject): ViewModelImplSkeletonModel
    {
        $skeletonModel = new ViewModelSkeletonModelImpl();
        // set $skeletonModel values from $neededFileObject

        return $skeletonModel;
    }
}
```

### step 6 : create mediator or add generator in existing mediator
The command use a mediator pattern to generate classes by functional group. 
The mediator load generators as services and arrange it by group. 
Add the new generator in the concerned group : 
``` php
# src/Mediators/Domain

class ViewModelMediatorImpl implements ViewModelMediator
{
    private $fileObjectGateway;

    private $generatorRequestBuilder;

    public function mediate(array $args = [], array $options = [])
    { 
        // set groups in terms of options list
        
        return $fileObjects
    }
    
    private function generateGroup()
    {
        //add generator FileObject response in the array
        $fileObjects[] = $this->generateViewModel($className);
    
        return $fileObjects;
    }
```
