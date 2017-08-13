<?php

namespace OpenClassrooms\CodeGenerator\Services;

use OpenClassrooms\CodeGenerator\ClassObjects\ClassObject;

/**
 * @author Romain Kuzniak <romain.kuzniak@openclassrooms.com>
 */
interface ClassObjectService
{
    public function getShowController(string $className, bool $admin = false): ClassObject;

    public function getListController(string $className, bool $admin = false): ClassObject;

    public function getEditFormType(string $className): ClassObject;

    /**
     * @return ClassObject[]
     */
    public function getEditModelTypes(string $className): array;

    public function getViewModelAssemblerTrait(string $className): ClassObject;

    public function getViewModelDetailAssembler(string $className): ClassObject;

    public function getViewModelDetailAssemblerImpl(string $className): ClassObject;

    public function getViewModelListItemAssembler(string $className): ClassObject;

    public function getViewModelListItemAssemblerImpl(string $className): ClassObject;

    public function getViewModelDetail(string $className): ClassObject;

    /**
     * @return ClassObject[]
     */
    public function getShowViewModels(string $className): array;

    /**
     * @return ClassObject[]
     */
    public function getShowViewModelBuilders(string $className): array;

    /**
     * @return ClassObject[]
     */
    public function getListViewModels(string $className): array;

    /**
     * @return ClassObject[]
     */
    public function getListViewModelBuilders(string $className): array;

    /**
     * @return ClassObject[]
     */
    public function getViewModels(string $className): array;

    public function getGetUseCase(string $className): ClassObject;

    public function getUseCaseResponseInterfaceFromClassName(string $className): ClassObject;

    public function getUseCaseDetailResponseInterfaceFromClassName(string $className): ClassObject;

    public function getGetUseCaseRequestBuilder(string $className): ClassObject;

    public function getGetAllUseCase(string $className): ClassObject;

    public function getGetAllUseCaseRequestBuilder(string $className): ClassObject;

    public function getEntityNotFoundException(string $className): ClassObject;

}
