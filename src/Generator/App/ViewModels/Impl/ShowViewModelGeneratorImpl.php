<?php

namespace OpenClassrooms\CodeGenerator\Generator\App\ViewModels\Impl;

use OpenClassrooms\CodeGenerator\Generator\AbstractGenerator;
use OpenClassrooms\CodeGenerator\Generator\App\ViewModels\ShowViewModelGenerator;

/**
 * @author Romain Kuzniak <romain.kuzniak@openclassrooms.com>
 */
class ShowViewModelGeneratorImpl extends AbstractGenerator implements ShowViewModelGenerator
{
    public function generate(string $className): array
    {
        list($showViewModel, $showViewModelImpl) = $this->classObjectService->getShowViewModels($className);
        $viewModelDetail = $this->classObjectService->getViewModelDetail($className);
        $showViewModelContent = $this->render(
            '/App/ViewModels/ShowViewModel.php.twig',
            [
                'showViewModelNamespace' => $showViewModel->getNamespace(),
                'showViewModelShortClassName' => $showViewModel->getShortClassName(),
                'viewModelDetailShortClassName' => $viewModelDetail->getShortClassName(),
                'viewModelDetailFieldName' => $viewModelDetail->getFieldName()
            ]
        );

        return [$showViewModel->getClassName() => $showViewModelContent];
    }
}
