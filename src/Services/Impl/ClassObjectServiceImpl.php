<?php

namespace OpenClassrooms\CodeGenerator\Services\Impl;

use OpenClassrooms\CodeGenerator\ClassObjects\ClassObject;
use OpenClassrooms\CodeGenerator\Services\ClassObjectService;
use OpenClassrooms\CodeGenerator\Utility\ClassNameUtility;

/**
 * @author Romain Kuzniak <romain.kuzniak@openclassrooms.com>
 */
class ClassObjectServiceImpl implements ClassObjectService
{
    use ClassNameUtility;

    /**
     * @var string
     */
    private $appNamespace = 'OpenClassrooms\CodeGenerator\Tests\Doubles\src\App';

    /**
     * @var string
     */
    private $baseNamespace = 'OpenClassrooms\CodeGenerator\Tests\Doubles\src';

    public function getController(string $className, bool $admin = false): ClassObject
    {
        list($domain, $entityName) = $this->getDomainAndEntityNameFromClassName($className);

        $controllerNamespace = $this->appNamespace.'\\Controller\\Web\\'.$domain;
        if ($admin) {
            $controllerNamespace .= 'Admin';
        }

        $shortClassName = 'Get'.$entityName.'Controller';

        return new ClassObject($controllerNamespace, $shortClassName);
    }

    public function getEditFormType(string $className): ClassObject
    {
        list($domain, $entityName) = $this->getDomainAndEntityNameFromClassName($className);

        return new ClassObject($this->appNamespace.'\\Form\\Type\\'.$domain, 'Edit'.$entityName.'Type');
    }

    public function getEditModelTypes(string $className): array
    {
        list($domain, $entityName) = $this->getDomainAndEntityNameFromClassName($className);

        return [
            new ClassObject($this->appNamespace.'\\Form\\Model\\'.$domain, $entityName.'Model', false, true),
            new ClassObject($this->appNamespace.'\\Form\\Model\\'.$domain, 'Edit'.$entityName.'Model')
        ];

    }

    /**
     * @return [ClassObject, ClassObject]|array
     */
    public function getViewModelAssembler(string $className): array
    {
        list($domain, $entityName) = $this->getDomainAndEntityNameFromClassName($className);

        return [
            new ClassObject(
                $this->appNamespace.'\\ViewModels\\Web\\'.$domain,
                $entityName.'Assembler',
                true
            ),
            new ClassObject(
                $this->appNamespace.'\\ViewModels\\Web\\'.$domain.'\\Impl',
                $entityName.'AssemblerImpl'
            )
        ];
    }

    /**
     * @return [ClassObject, ClassObject]|array
     */
    public function getViewModels(string $className): array
    {
        list($domain, $entityName) = $this->getDomainAndEntityNameFromClassName($className);

        return [
            new ClassObject(
                $this->appNamespace.'\\ViewModels\\Web\\'.$domain,
                $entityName.'Detail'
            ),
            new ClassObject(
                $this->appNamespace.'\\ViewModels\\Web\\'.$domain.'\\Impl',
                $entityName.'DetailImpl'
            )
        ];
    }

    public function getEntityNotFoundException(string $className): ClassObject
    {
        list($domain, $entityName) = $this->getDomainAndEntityNameFromClassName($className);

        return new ClassObject(
            $this->baseNamespace.'\\BusinessRules\\Gateways\\'.$domain, $entityName.'NotFoundException'
        );
    }

    public function getGetUseCase(string $className): ClassObject
    {
        list($domain, $entityName) = $this->getDomainAndEntityNameFromClassName($className);

        return new ClassObject($this->baseNamespace.'\\BusinessRules\\UseCases\\'.$domain, 'Get'.$entityName);
    }

    public function getGetUseCaseRequestBuilder(string $className): ClassObject
    {
        list($domain, $entityName) = $this->getDomainAndEntityNameFromClassName($className);

        return new ClassObject(
            $this->baseNamespace.'\\BusinessRules\\Requestors\\'.$domain,
            'Get'.$entityName.'RequestBuilder'
        );
    }

    public function setAppNamespace(string $appNamespace)
    {
        $this->appNamespace = $appNamespace;
    }

    public function setBaseNamespace(string $baseNamespace)
    {
        $this->baseNamespace = $baseNamespace;
    }
}
