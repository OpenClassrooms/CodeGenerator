<?php

namespace OpenClassrooms\CodeGenerator\Generator\App\ViewModels\Impl;

use OpenClassrooms\CodeGenerator\Generator\AbstractGenerator;
use OpenClassrooms\CodeGenerator\Generator\App\ViewModels\AbstractViewModelGenerator;
use OpenClassrooms\CodeGenerator\Generator\App\ViewModels\ViewModelGenerator;

/**
 * @author Romain Kuzniak <romain.kuzniak@openclassrooms.com>
 */
class ViewModelDetailGeneratorImpl extends AbstractViewModelGenerator
{
    /**
     * @var \OpenClassrooms\CodeGenerator\Generator\App\ViewModels\ViewModelGenerator|AbstractGenerator
     */
    private $viewModelGenerator;

    public function generate(string $className): array
    {
        /** @var \OpenClassrooms\CodeGenerator\ClassObjects\ClassObject $viewModel */
        /** @var \OpenClassrooms\CodeGenerator\ClassObjects\ClassObject $viewModelDetail */
        /** @var \OpenClassrooms\CodeGenerator\ClassObjects\ClassObject $viewModelDetailImpl */
        list($viewModel, $viewModelDetail, $viewModelDetailImpl) = $this->viewModelClassObjectService->getViewModels(
            $className
        );

        $viewModelDetailContent = $this->render(
            '/App/ViewModels/ViewModelDetail.php.twig',
            [
                'vmDetailNamespace' => $viewModelDetail->getNamespace(),
                'vmDetailShortClassName' => $viewModelDetail->getShortClassName(),
                'vmShortClassName' => $viewModel->getShortClassName(),
                'vmDetailFields' => $this->fieldObjectService->getPublicClassFields($className)
            ]
        );

        $viewModelDetailImplContent = $this->render(
            '/App/ViewModels/Impl/ViewModelDetailImpl.php.twig',
            [
                'vmDetailImplNamespace' => $viewModelDetailImpl->getNamespace(),
                'vmDetailImplShortClassName' => $viewModelDetailImpl->getShortClassName(),
                'vmDetailClassName' => $viewModelDetail->getClassName(),
                'vmDetailShortClassName' => $viewModelDetail->getShortClassName()
            ]
        );
        $generatedClasses = [];
        $generatedClasses = array_merge($generatedClasses, $this->viewModelGenerator->generate($className));

        $generatedClasses[$viewModelDetail->getClassName()] = $viewModelDetailContent;
        $generatedClasses[$viewModelDetailImpl->getClassName()] = $viewModelDetailImplContent;

        return $generatedClasses;
    }

    public function setViewModelGenerator(ViewModelGenerator $viewModelGenerator)
    {
        $this->viewModelGenerator = $viewModelGenerator;
    }
}
