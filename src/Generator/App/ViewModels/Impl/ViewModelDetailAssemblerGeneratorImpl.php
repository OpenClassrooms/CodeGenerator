<?php

namespace OpenClassrooms\CodeGenerator\Generator\App\ViewModels\Impl;

use OpenClassrooms\CodeGenerator\Generator\AbstractGenerator;
use OpenClassrooms\CodeGenerator\Generator\App\ViewModels\ViewModelAssemblerTraitGenerator;

/**
 * @author Romain Kuzniak <romain.kuzniak@openclassrooms.com>
 */
class ViewModelDetailAssemblerGeneratorImpl extends AbstractGenerator
{
    /**
     * @var \OpenClassrooms\CodeGenerator\Generator\App\ViewModels\ViewModelAssemblerTraitGenerator
     */
    private $viewModelAssemblerTraitGenerator;

    public function generate(string $className): array
    {
        $entityName = $this->getEntityNameFromClassName($className);
        $useCaseResponse = $this->classObjectService->getUseCaseDetailResponseInterfaceFromClassName($className);

        $viewModelAssemblerTrait = $this->classObjectService->getViewModelAssemblerTrait($className);
        $viewModelDetailAssembler = $this->classObjectService->getViewModelDetailAssembler($className);
        $viewModelDetailAssemblerImpl = $this->classObjectService->getViewModelDetailAssemblerImpl($className);

        /** @var \OpenClassrooms\CodeGenerator\ClassObjects\ClassObject $vm */
        /** @var \OpenClassrooms\CodeGenerator\ClassObjects\ClassObject $viewModelDetail */
        /** @var \OpenClassrooms\CodeGenerator\ClassObjects\ClassObject $viewModelDetailImpl */
        list($vm, $viewModelDetail, $viewModelDetailImpl) = $this->classObjectService->getViewModels($className);

        $viewModelDetailAssemblerContent = $this->render(
            '/App/ViewModels/ViewModelDetailAssembler.php.twig',
            [
                'viewModelDetailAssemblerNamespace' => $viewModelDetailAssembler->getNamespace(),
                'viewModelDetailAssemblerShortClassName' => $viewModelDetailAssembler->getShortClassName(),
                'viewModelDetailShortClassName' => $viewModelDetail->getShortClassName(),
                'useCaseResponseClassName' => $useCaseResponse->getClassName(),
                'useCaseResponseShortClassName' => $useCaseResponse->getShortClassName(),
                'entityName' => lcfirst($entityName)
            ]
        );

        $viewModelDetailAssemblerImplContent = $this->render(
            '/App/ViewModels/Impl/ViewModelDetailAssemblerImpl.php.twig',
            [
                'viewModelDetailAssemblerImplNamespace' => $viewModelDetailAssemblerImpl->getNamespace(),
                'viewModelDetailAssemblerImplShortClassName' => $viewModelDetailAssemblerImpl->getShortClassName(),
                'viewModelDetailAssemblerClassName' => $viewModelDetailAssembler->getClassName(),
                'viewModelDetailAssemblerShortClassName' => $viewModelDetailAssembler->getShortClassName(),
                'viewModelDetailClassName' => $viewModelDetail->getClassName(),
                'viewModelDetailShortClassName' => $viewModelDetail->getShortClassName(),
                'viewModelDetailImplClassName' => $viewModelDetailImpl->getClassName(),
                'viewModelDetailImplShortClassName' => $viewModelDetailImpl->getShortClassName(),
                'viewModelAssemblerTraitClassName' => $viewModelAssemblerTrait->getClassName(),
                'viewModelAssemblerTraitShortClassName' => $viewModelAssemblerTrait->getShortClassName(),
                'useCaseResponseClassName' => $useCaseResponse->getClassName(),
                'useCaseResponseShortClassName' => $useCaseResponse->getShortClassName(),
                'entityName' => lcfirst($entityName)

            ]
        );

        $generatedClasses = [];
        $generate = $this->viewModelAssemblerTraitGenerator->generate($className);
        $generatedClasses = array_merge($generatedClasses, $generate);
        $generatedClasses[$viewModelDetailAssembler->getClassName()] = $viewModelDetailAssemblerContent;
        $generatedClasses[$viewModelDetailAssemblerImpl->getClassName()] = $viewModelDetailAssemblerImplContent;

        return $generatedClasses;
    }

    public function setViewModelAssemblerTraitGenerator(
        ViewModelAssemblerTraitGenerator $viewModelAssemblerTraitGenerator
    ) {
        $this->viewModelAssemblerTraitGenerator = $viewModelAssemblerTraitGenerator;
    }
}
