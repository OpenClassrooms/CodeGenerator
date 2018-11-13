<?php declare(strict_types=1);

namespace OpenClassrooms\CodeGenerator\Generator\App\ViewModels\Impl;

use OpenClassrooms\CodeGenerator\Generator\App\ViewModels\OldAbstractViewModelGenerator;
use OpenClassrooms\CodeGenerator\Generator\App\ViewModels\ViewModelGenerator;

/**
 * @author Romain Kuzniak <romain.kuzniak@openclassrooms.com>
 */
class ViewModelGeneratorImpl extends OldAbstractViewModelGenerator implements ViewModelGenerator
{
    public function generate(string $className, array $parameters = []): array
    {
        /** @var \OpenClassrooms\CodeGenerator\ClassObjects\ClassObject $viewModel */
        /** @var \OpenClassrooms\CodeGenerator\ClassObjects\ClassObject $viewModelDetail */
        /** @var \OpenClassrooms\CodeGenerator\ClassObjects\ClassObject $vmDetailImpl */
        [$viewModel, $viewModelDetail, $viewModelDetailImpl] = $this->viewModelClassObjectService->getViewModels(
            $className
        );
        $entityVM = $this->render(
            '/App/ViewModels/ViewModel.php.twig',
            [
                'viewModelNamespace'      => $viewModel->getNamespace(),
                'viewModelShortClassName' => $viewModel->getShortClassName(),
                'viewModelFields'         => $this->fieldObjectService->getParentPublicClassFields($className),
            ]
        );

        return [$viewModel->getClassName() => $entityVM];
    }
}
