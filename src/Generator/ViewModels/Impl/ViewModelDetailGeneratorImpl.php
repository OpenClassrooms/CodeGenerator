<?php

namespace OpenClassrooms\CodeGenerator\Generator\ViewModels\Impl;

use OpenClassrooms\CodeGenerator\Generator\Generator;

/**
 * @author Romain Kuzniak <romain.kuzniak@openclassrooms.com>
 */
class ViewModelDetailGeneratorImpl extends Generator
{
    public function generate(string $className)
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

        $entityDetailVM = $this->render(
            '/ViewModels/EntityDetail.php.twig',
            [
                'vmDetailNamespace' => $vmDetail->getNamespace(),
                'vmDetailShortClassName' => $vmDetail->getShortClassName(),
                'vmShortClassName' => $vm->getShortClassName(),
                'vmDetailFields' => $this->fieldObjectService->getPublicClassFields($className)
            ]
        );

        $entityDetailImplVM = $this->render(
            '/ViewModels/EntityDetailImpl.php.twig',
            [
                'vmDetailImplNamespace' => $vmDetailImpl->getNamespace(),
                'vmDetailImplShortClassName' => $vmDetailImpl->getShortClassName(),
                'vmDetailClassName' => $vmDetail->getClassName(),
                'vmDetailShortClassName' => $vmDetail->getShortClassName()
            ]
        );

        return [
            $vm->getClassName() => $entityVM,
            $vmDetail->getClassName() => $entityDetailVM,
            $vmDetailImpl->getClassName() => $entityDetailImplVM
        ];
    }
}
