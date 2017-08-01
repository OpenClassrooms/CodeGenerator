<?php

namespace OpenClassrooms\CodeGenerator\Generator\App\ViewModels\Impl;

use OpenClassrooms\CodeGenerator\Generator\AbstractGenerator;
use OpenClassrooms\CodeGenerator\Generator\App\ViewModels\ShowViewModelGenerator;
use OpenClassrooms\CodeGenerator\Generator\App\ViewModels\ViewModelGenerator;

/**
 * @author Romain Kuzniak <romain.kuzniak@openclassrooms.com>
 */
class ShowViewModelGeneratorImpl extends AbstractGenerator implements ShowViewModelGenerator
{
    public function generate(string $className): array
    {
        list($showViewModel, $showViewModelImpl) = $this->classObjectService->getShowViewModels($className);
        $showViewModelContent = $this->render(
            '/ViewModels/ShowViewModel.php.twig',
            [
                'showViewModelNamespace' => $vm->getNamespace(),
                'vmShortClassName' => $vm->getShortClassName(),
                'vmFields' => $this->fieldObjectService->getParentPublicClassFields($className)
            ]
        );

        return [$vm->getClassName() => $entityVM];
    }
}
