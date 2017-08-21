<?php

namespace OpenClassrooms\CodeGenerator\Services;

use OpenClassrooms\CodeGenerator\ClassObjects\ClassObject;

/**
 * @author Romain Kuzniak <romain.kuzniak@openclassrooms.com>
 */
interface ViewModelClassObjectService
{
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
}
