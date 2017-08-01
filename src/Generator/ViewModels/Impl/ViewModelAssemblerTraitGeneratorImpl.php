<?php

namespace OpenClassrooms\CodeGenerator\Generator\ViewModels\Impl;

use OpenClassrooms\CodeGenerator\Generator\AbstractGenerator;
use OpenClassrooms\CodeGenerator\Generator\ViewModels\ViewModelAssemblerTraitGenerator;

/**
 * @author Romain Kuzniak <romain.kuzniak@openclassrooms.com>
 */
class ViewModelAssemblerTraitGeneratorImpl extends AbstractGenerator implements ViewModelAssemblerTraitGenerator
{
    public function generate(string $className): array
    {
        $entityName = $this->getEntityNameFromClassName($className);
        $useCaseResponse = $this->classObjectService->getUseCaseResponseInterfaceFromClassName($className);
        $viewModelAssemblerTrait = $this->classObjectService->getViewModelAssemblerTrait($className);

        /** @var \OpenClassrooms\CodeGenerator\ClassObjects\ClassObject $vm */
        /** @var \OpenClassrooms\CodeGenerator\ClassObjects\ClassObject $vmDetail */
        /** @var \OpenClassrooms\CodeGenerator\ClassObjects\ClassObject $vmDetailImpl */
        list($vm, $vmDetail, $vmDetailImpl) = $this->classObjectService->getViewModels($className);

        $viewModelAssemblerTraitContent = $this->render(
            '/ViewModels/ViewModelAssemblerTrait.php.twig',
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
}
