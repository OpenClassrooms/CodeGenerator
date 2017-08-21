<?php

namespace OpenClassrooms\CodeGenerator\Services;

use OpenClassrooms\CodeGenerator\ClassObjects\ClassObject;

/**
 * @author Romain Kuzniak <romain.kuzniak@openclassrooms.com>
 */
interface UseCaseClassObjectService
{
    public function getGetUseCase(string $className): ClassObject;

    public function getUseCaseResponseInterfaceFromClassName(string $className): ClassObject;

    public function getUseCaseDetailResponseInterfaceFromClassName(string $className): ClassObject;

    public function getGetUseCaseRequestBuilder(string $className): ClassObject;

    public function getGetAllUseCase(string $className): ClassObject;

    public function getGetAllUseCaseRequestBuilder(string $className): ClassObject;
}
