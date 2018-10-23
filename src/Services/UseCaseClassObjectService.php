<?php

namespace OpenClassrooms\CodeGenerator\Services;

use OpenClassrooms\CodeGenerator\ClassObjects\ClassObject;

/**
 * @author Romain Kuzniak <romain.kuzniak@openclassrooms.com>
 */
interface UseCaseClassObjectService
{
    public function getUseCase(string $className): ClassObject;

//    public function getGetUseCase(string $className): ClassObject;
//
//    public function getUseCaseResponse(string $className): ClassObject;
//
//    public function getUseCaseResponseDTO(string $className): ClassObject;
//
//    public function getUseCaseDetailResponse(string $className): ClassObject;
//
//    public function getUseCaseDetailResponseDTO(string $className): ClassObject;
//
//    public function getUseCaseDetailResponseAssembler(string $className): ClassObject;
//
//    public function getUseCaseResponseAssemblerTrait(string $className): ClassObject;
//
//    public function getUseCaseDetailResponseAssemblerImpl(string $className): ClassObject;
//
//    public function getGetUseCaseRequest(string $className): ClassObject;
//
//    public function getGetUseCaseRequestDTO(string $className): ClassObject;
//
//    public function getGetUseCaseRequestBuilder(string $className): ClassObject;
//
//    public function getGetUseCaseRequestBuilderImpl(string $className): ClassObject;
//
//    public function getGetAllUseCase(string $className): ClassObject;
//
//    public function getGetAllUseCaseRequestBuilder(string $className): ClassObject;
}
