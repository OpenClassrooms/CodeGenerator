<?php

namespace OpenClassrooms\CodeGenerator\Generator\App\ViewModels\Impl;

use OpenClassrooms\CodeGenerator\Generator\AbstractGenerator;
use OpenClassrooms\CodeGenerator\Generator\App\ViewModels\ViewModelGenerator;

/**
 * @author Romain Kuzniak <romain.kuzniak@openclassrooms.com>
 */
class ViewModelGeneratorImpl extends AbstractGenerator implements ViewModelGenerator
{
    public function generate(string $className): array
    {
        /** @var \OpenClassrooms\CodeGenerator\ClassObjects\ClassObject $vm */
        /** @var \OpenClassrooms\CodeGenerator\ClassObjects\ClassObject $vmDetail */
        /** @var \OpenClassrooms\CodeGenerator\ClassObjects\ClassObject $vmDetailImpl */
        list($vm, $vmDetail, $vmDetailImpl) = $this->classObjectService->getViewModels($className);
        $entityVM = $this->render(
            '/ViewModels/Entity.php.twig',
            [
                'vmNamespace' => $vm->getNamespace(),
                'vmShortClassName' => $vm->getShortClassName(),
                'vmFields' => $this->fieldObjectService->getParentPublicClassFields($className)
            ]
        );

        return [$vm->getClassName() => $entityVM];
    }
}
