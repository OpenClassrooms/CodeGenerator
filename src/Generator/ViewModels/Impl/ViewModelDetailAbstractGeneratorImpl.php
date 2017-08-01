<?php

namespace OpenClassrooms\CodeGenerator\Generator\ViewModels\Impl;

use OpenClassrooms\CodeGenerator\Generator\AbstractGenerator;
use OpenClassrooms\CodeGenerator\Generator\ViewModels\ViewModelGenerator;

/**
 * @author Romain Kuzniak <romain.kuzniak@openclassrooms.com>
 */
class ViewModelDetailAbstractGeneratorImpl extends AbstractGenerator
{
    /**
     * @var \OpenClassrooms\CodeGenerator\Generator\ViewModels\ViewModelGenerator|AbstractGenerator
     */
    private $viewModelGenerator;

    public function generate(string $className): array
    {
        /** @var \OpenClassrooms\CodeGenerator\ClassObjects\ClassObject $viewModel */
        /** @var \OpenClassrooms\CodeGenerator\ClassObjects\ClassObject $viewModelDetail */
        /** @var \OpenClassrooms\CodeGenerator\ClassObjects\ClassObject $viewModelDetailImpl */
        list($viewModel, $viewModelDetail, $viewModelDetailImpl) = $this->classObjectService->getViewModels($className);

        $viewModelDetailContent = $this->render(
            '/ViewModels/EntityDetail.php.twig',
            [
                'vmDetailNamespace' => $viewModelDetail->getNamespace(),
                'vmDetailShortClassName' => $viewModelDetail->getShortClassName(),
                'vmShortClassName' => $viewModel->getShortClassName(),
                'vmDetailFields' => $this->fieldObjectService->getPublicClassFields($className)
            ]
        );

        $viewModelDetailImplContent = $this->render(
            '/ViewModels/EntityDetailImpl.php.twig',
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
