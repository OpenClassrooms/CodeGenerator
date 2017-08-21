<?php

namespace OpenClassrooms\CodeGenerator\Generator\App\ViewModels\Impl;

use OpenClassrooms\CodeGenerator\Generator\App\ViewModels\AbstractViewModelGenerator;
use OpenClassrooms\CodeGenerator\Generator\App\ViewModels\ViewModelAssemblerTraitGenerator;
use OpenClassrooms\CodeGenerator\Services\UseCaseClassObjectService;

/**
 * @author Romain Kuzniak <romain.kuzniak@openclassrooms.com>
 */
class ViewModelAssemblerTraitGeneratorImpl extends AbstractViewModelGenerator implements ViewModelAssemblerTraitGenerator
{
    /**
     * @var \OpenClassrooms\CodeGenerator\Services\UseCaseClassObjectService
     */
    private $useCaseClassObjectService;

    public function generate(string $className): array
    {
        $entityName = $this->getEntityNameFromClassName($className);
        $useCaseResponse = $this->useCaseClassObjectService->getUseCaseResponseInterfaceFromClassName($className);
        $viewModelAssemblerTrait = $this->viewModelClassObjectService->getViewModelAssemblerTrait($className);

        /** @var \OpenClassrooms\CodeGenerator\ClassObjects\ClassObject $vm */
        /** @var \OpenClassrooms\CodeGenerator\ClassObjects\ClassObject $vmDetail */
        /** @var \OpenClassrooms\CodeGenerator\ClassObjects\ClassObject $vmDetailImpl */
        list($vm, $vmDetail, $vmDetailImpl) = $this->viewModelClassObjectService->getViewModels($className);

        $viewModelAssemblerTraitContent = $this->render(
            '/App/ViewModels/ViewModelAssemblerTrait.php.twig',
            [
                'entityName' => lcfirst($entityName),
                'useCaseResponseClassName' => $useCaseResponse->getClassName(),
                'useCaseResponseShortClassName' => $useCaseResponse->getShortClassName(),
                'viewModelAssemblerTraitNamespace' => $viewModelAssemblerTrait->getNamespace(),
                'viewModelAssemblerTraitShortClassName' => $viewModelAssemblerTrait->getShortClassName(),
                'viewModelShortClassName' => $vm->getShortClassName(),
                'fields' => $this->fieldObjectService->getParentPublicClassFields($className)
            ]
        );

        return [$viewModelAssemblerTrait->getClassName() => $viewModelAssemblerTraitContent];
    }

    public function setUseCaseClassObjectService(UseCaseClassObjectService $useCaseClassObjectService)
    {
        $this->useCaseClassObjectService = $useCaseClassObjectService;
    }
}
