<?php

namespace OpenClassrooms\CodeGenerator\Services\Impl;

use Doctrine\Common\Inflector\Inflector;
use OpenClassrooms\CodeGenerator\ClassObjects\ClassObject;
use OpenClassrooms\CodeGenerator\Services\UseCaseClassObjectService;

/**
 * @author Romain Kuzniak <romain.kuzniak@openclassrooms.com>
 */
class UseCaseClassObjectServiceImpl extends ClassObjectServiceImpl implements UseCaseClassObjectService
{

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

    public function getGetAllUseCase(string $className): ClassObject
    {
        list($domain, $entityName) = $this->getDomainAndEntityNameFromClassName($className);

        return new ClassObject(
            $this->baseNamespace.'\\BusinessRules\\UseCases\\'.$domain,
            'GetAll'.Inflector::pluralize($entityName)
        );
    }

    public function getGetAllUseCaseRequestBuilder(string $className): ClassObject
    {
        list($domain, $entityName) = $this->getDomainAndEntityNameFromClassName($className);

        return new ClassObject(
            $this->baseNamespace.'\\BusinessRules\\Requestors\\'.$domain,
            'GetAll'.Inflector::pluralize($entityName).'RequestBuilder'
        );
    }
}
