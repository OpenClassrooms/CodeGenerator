<?php

namespace OpenClassrooms\CodeGenerator\Services\Impl;

use OpenClassrooms\CodeGenerator\ClassObjects\ClassObject;
use OpenClassrooms\CodeGenerator\Services\UseCaseClassObjectService;

/**
 * @author Romain Kuzniak <romain.kuzniak@openclassrooms.com>
 */
class UseCaseClassObjectServiceImpl extends ClassObjectServiceImpl implements UseCaseClassObjectService
{
    public function getUseCase(string $className): ClassObject
    {
        $domain = $this->getDomainFromClassName($className);

        return new ClassObject(
            $this->baseNamespace.'\\BusinessRules\\UseCases\\'.$domain,
            $this->getShortClassNameFromClassName($className)
        );
    }

//    public function getUseCaseResponse(string $className): ClassObject
//    {
//        list($domain, $entityName) = $this->getDomainAndEntityNameFromClassName($className);
//
//        return new ClassObject(
//            $this->baseNamespace.'\\BusinessRules\\Responders\\'.$domain,
//            $entityName.'Response',
//            true
//        );
//    }
//
//    public function getUseCaseResponseDTO(string $className): ClassObject
//    {
//        list($domain, $entityName) = $this->getDomainAndEntityNameFromClassName($className);
//
//        return new ClassObject(
//            $this->baseNamespace.'\\BusinessRules\\UseCases\\'.$domain.'\\DTO\\Response',
//            $entityName.'ResponseDTO',
//            false,
//            true
//        );
//    }
//
//    public function getUseCaseDetailResponse(string $className): ClassObject
//    {
//        list($domain, $entityName) = $this->getDomainAndEntityNameFromClassName($className);
//
//        return new ClassObject(
//            $this->baseNamespace.'\\BusinessRules\\Responders\\'.$domain,
//            $entityName.'DetailResponse',
//            true
//        );
//    }
//
//    public function getUseCaseDetailResponseDTO(string $className): ClassObject
//    {
//        list($domain, $entityName) = $this->getDomainAndEntityNameFromClassName($className);
//
//        return new ClassObject(
//            $this->baseNamespace.'\\BusinessRules\\UseCases\\'.$domain.'\\DTO\\Response',
//            $entityName.'DetailResponseDTO'
//        );
//    }
//
//    public function getUseCaseDetailResponseAssembler(string $className): ClassObject
//    {
//        list($domain, $entityName) = $this->getDomainAndEntityNameFromClassName($className);
//
//        return new ClassObject(
//            $this->baseNamespace.'\\BusinessRules\\Responders\\'.$domain,
//            $entityName.'DetailResponseAssembler',
//            true
//        );
//    }
//
//    public function getUseCaseResponseAssemblerTrait(string $className): ClassObject
//    {
//        list($domain, $entityName) = $this->getDomainAndEntityNameFromClassName($className);
//
//        return new ClassObject(
//            $this->baseNamespace.'\\BusinessRules\\UseCases\\'.$domain.'\\DTO\\Response',
//            $entityName.'ResponseAssemblerTrait'
//        );
//    }
//
//    public function getUseCaseDetailResponseAssemblerImpl(string $className): ClassObject
//    {
//        list($domain, $entityName) = $this->getDomainAndEntityNameFromClassName($className);
//
//        return new ClassObject(
//            $this->baseNamespace.'\\BusinessRules\\UseCases\\'.$domain.'\\DTO\\Response',
//            $entityName.'DetailResponseAssemblerImpl'
//        );
//    }
//
//    public function getGetUseCase(string $className): ClassObject
//    {
//        list($domain, $entityName) = $this->getDomainAndEntityNameFromClassName($className);
//
//        return new ClassObject($this->baseNamespace.'\\BusinessRules\\UseCases\\'.$domain, 'Get'.$entityName);
//    }
//
//    public function getGetUseCaseRequest(string $className): ClassObject
//    {
//        list($domain, $entityName) = $this->getDomainAndEntityNameFromClassName($className);
//
//        return new ClassObject(
//            $this->baseNamespace.'\\BusinessRules\\Requestors\\'.$domain,
//            'Get'.$entityName.'Request',
//            true
//        );
//    }
//
//    public function getGetUseCaseRequestDTO(string $className): ClassObject
//    {
//        list($domain, $entityName) = $this->getDomainAndEntityNameFromClassName($className);
//
//        return new ClassObject(
//            $this->baseNamespace.'\\BusinessRules\\UseCases\\'.$domain.'\\DTO\Request',
//            'Get'.$entityName.'RequestDTO'
//        );
//    }
//
//    public function getGetUseCaseRequestBuilder(string $className): ClassObject
//    {
//        list($domain, $entityName) = $this->getDomainAndEntityNameFromClassName($className);
//
//        return new ClassObject(
//            $this->baseNamespace.'\\BusinessRules\\Requestors\\'.$domain,
//            'Get'.$entityName.'RequestBuilder',
//            true
//        );
//    }
//
//    public function getGetUseCaseRequestBuilderImpl(string $className): ClassObject
//    {
//        list($domain, $entityName) = $this->getDomainAndEntityNameFromClassName($className);
//
//        return new ClassObject(
//            $this->baseNamespace.'\\BusinessRules\\UseCases\\'.$domain.'\\DTO\Request',
//            'Get'.$entityName.'RequestBuilderImpl'
//        );
//    }
//
//    public function getGetAllUseCase(string $className): ClassObject
//    {
//        list($domain, $entityName) = $this->getDomainAndEntityNameFromClassName($className);
//
//        return new ClassObject(
//            $this->baseNamespace.'\\BusinessRules\\UseCases\\'.$domain,
//            'GetAll'.Inflector::pluralize($entityName)
//        );
//    }
//
//    public function getGetAllUseCaseRequestBuilder(string $className): ClassObject
//    {
//        list($domain, $entityName) = $this->getDomainAndEntityNameFromClassName($className);
//
//        return new ClassObject(
//            $this->baseNamespace.'\\BusinessRules\\Requestors\\'.$domain,
//            'GetAll'.Inflector::pluralize($entityName).'RequestBuilder'
//        );
//    }
}
