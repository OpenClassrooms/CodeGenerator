<?php declare(strict_types=1);

namespace OpenClassrooms\CodeGenerator\Generator\App\ViewModels\Impl;

use OpenClassrooms\CodeGenerator\Generator\App\ViewModels\OldAbstractViewModelGenerator;
use OpenClassrooms\CodeGenerator\Generator\App\ViewModels\ViewModelGenerator;
use OpenClassrooms\CodeGenerator\Generator\OldAbstractGenerator;

/**
 * @author Romain Kuzniak <romain.kuzniak@openclassrooms.com>
 */
class ViewModelDetailGeneratorImpl extends OldAbstractViewModelGenerator
{
    /**
     * @var \OpenClassrooms\CodeGenerator\Generator\App\ViewModels\ViewModelGenerator|OldAbstractGenerator
     */
    private $viewModelGenerator;

    public function generate(string $className, array $parameters = []): array
    {
        /** @var \OpenClassrooms\CodeGenerator\ClassObjects\ClassObject $viewModel */
        /** @var \OpenClassrooms\CodeGenerator\ClassObjects\ClassObject $viewModelDetail */
        /** @var \OpenClassrooms\CodeGenerator\ClassObjects\ClassObject $viewModelDetailImpl */
        [$viewModel, $viewModelDetail, $viewModelDetailImpl] = $this->viewModelClassObjectService->getViewModels(
            $className
        );

        $viewModelDetailContent = $this->render(
            '/App/ViewModels/ViewModelDetail.php.twig',
            [
                'vmDetailNamespace'      => $viewModelDetail->getNamespace(),
                'vmDetailShortClassName' => $viewModelDetail->getShortClassName(),
                'vmShortClassName'       => $viewModel->getShortClassName(),
                'vmDetailFields'         => $this->fieldObjectService->getPublicClassFields($className),
            ]
        );

        $viewModelDetailImplContent = $this->render(
            '/App/ViewModels/Impl/ViewModelDetailImpl.php.twig',
            [
                'vmDetailImplNamespace'      => $viewModelDetailImpl->getNamespace(),
                'vmDetailImplShortClassName' => $viewModelDetailImpl->getShortClassName(),
                'vmDetailClassName'          => $viewModelDetail->getClassName(),
                'vmDetailShortClassName'     => $viewModelDetail->getShortClassName(),
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
