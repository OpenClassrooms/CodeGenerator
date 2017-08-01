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
    private $appNamespace;

    /**
     * @var string
     */
    private $baseNamespace;

    public function getUseCaseResponseInterfaceFromClassName(string $className): ClassObject
    {
        $rc = new \ReflectionClass($className);
        /** \ReflectionClass[] $ris */
        $ris = $rc->getInterfaces();
        end($ris);
        $ri = prev($ris);

        return new ClassObject($ri->getNamespaceName(), $ri->getShortName());
    }

    public function getUseCaseDetailResponseInterfaceFromClassName(string $className): ClassObject
    {
        $rc = new \ReflectionClass($className);
        /** \ReflectionClass[] $ris */
        $ris = $rc->getInterfaces();
        $ri = end($ris);

        return new ClassObject($ri->getNamespaceName(), $ri->getShortName());
    }

    public function getController(string $className, bool $admin = false): ClassObject
    {
        list($domain, $entityName) = $this->getDomainAndEntityNameFromClassName($className);

        $controllerNamespace = $this->appNamespace.'\\Controller\\Web\\'.$domain;
        if ($admin) {
            $controllerNamespace .= '\\Admin';
        }

        $shortClassName = 'Show'.$entityName.'Controller';

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

    public function getViewModelAssemblerTrait(string $className): ClassObject
    {
        list($domain, $entityName) = $this->getDomainAndEntityNameFromClassName($className);

        return new ClassObject(
            $this->appNamespace.'\\ViewModels\\Web\\'.$domain,
            $entityName.'AssemblerTrait'
        );
    }

    public function getViewModelDetailAssembler(string $className): ClassObject
    {
        list($domain, $entityName) = $this->getDomainAndEntityNameFromClassName($className);

        return new ClassObject(
            $this->appNamespace.'\\ViewModels\\Web\\'.$domain,
            $entityName.'DetailAssembler',
            true
        );
    }

    public function getViewModelDetailAssemblerImpl(string $className): ClassObject
    {
        list($domain, $entityName) = $this->getDomainAndEntityNameFromClassName($className);

        return new ClassObject(
            $this->appNamespace.'\\ViewModels\\Web\\'.$domain.'\\Impl',
            $entityName.'DetailAssemblerImpl'
        );
    }

    public function getShowViewModels(string $className): array
    {
        list($domain, $entityName) = $this->getDomainAndEntityNameFromClassName($className);

        return [
            new ClassObject($this->appNamespace.'\\ViewModels\\Web\\'.$domain, 'Show'.$entityName),
            new ClassObject($this->appNamespace.'\\ViewModels\\Web\\'.$domain.'\\Impl', 'Show'.$entityName.'Impl')
        ];
    }

    public function getShowViewModelBuilders(string $className): array
    {
        list($domain, $entityName) = $this->getDomainAndEntityNameFromClassName($className);

        return [
            new ClassObject($this->appNamespace.'\\ViewModels\\Web\\'.$domain, 'Show'.$entityName.'Builder'),
            new ClassObject(
                $this->appNamespace.'\\ViewModels\\Web\\'.$domain.'\\Impl', 'Show'.$entityName.'BuilderImpl'
            )
        ];
    }

    /**
     * @return ClassObject[]
     */
    public function getViewModels(string $className): array
    {
        list($domain, $entityName) = $this->getDomainAndEntityNameFromClassName($className);

        return [
            new ClassObject(
                $this->appNamespace.'\\ViewModels\\Web\\'.$domain,
                $entityName,
                false,
                true
            ),
            new ClassObject(
                $this->appNamespace.'\\ViewModels\\Web\\'.$domain,
                $entityName.'Detail',
                false,
                true
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
