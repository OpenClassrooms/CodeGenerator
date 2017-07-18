<?php

namespace OpenClassrooms\CodeGenerator\Services;

use OpenClassrooms\CodeGenerator\ClassObjects\ClassObject;

/**
 * @author Romain Kuzniak <romain.kuzniak@openclassrooms.com>
 */
interface ClassObjectService
{
    public function getController(string $className, bool $admin = false): ClassObject;

    public function getEditFormType(string $className): ClassObject;

    public function getEditModelTypes(string $className): array;

    public function getViewModelAssembler(string $className): array;

    public function getViewModels(string $className): array;

    public function getGetUseCase(string $className): ClassObject;

    public function getGetUseCaseRequestBuilder(string $className): ClassObject;

    public function getEntityNotFoundException(string $className): ClassObject;

}
