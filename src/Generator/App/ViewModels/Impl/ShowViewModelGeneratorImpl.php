<?php declare(strict_types=1);

namespace OpenClassrooms\CodeGenerator\Generator\App\ViewModels\Impl;

use OpenClassrooms\CodeGenerator\Generator\App\ViewModels\OldAbstractViewModelGenerator;
use OpenClassrooms\CodeGenerator\Generator\App\ViewModels\ShowViewModelGenerator;

/**
 * @author Romain Kuzniak <romain.kuzniak@openclassrooms.com>
 */
class ShowViewModelGeneratorImpl extends OldAbstractViewModelGenerator implements ShowViewModelGenerator
{
    public function generate(string $className, array $parameters = []): array
    {
        [$showViewModel, $showViewModelImpl] = $this->viewModelClassObjectService->getShowViewModels($className);
        $viewModelDetail = $this->viewModelClassObjectService->getViewModelDetail($className);
        $showViewModelContent = $this->render(
            '/App/ViewModels/ShowViewModel.php.twig',
            [
                'showViewModelNamespace'        => $showViewModel->getNamespace(),
                'showViewModelShortClassName'   => $showViewModel->getShortClassName(),
                'viewModelDetailShortClassName' => $viewModelDetail->getShortClassName(),
                'viewModelDetailFieldName'      => $viewModelDetail->getFieldName(),
            ]
        );

        return [$showViewModel->getClassName() => $showViewModelContent];
    }
}
