<?php declare(strict_types=1);

namespace OpenClassrooms\CodeGenerator\Generator\App\ViewModels\Impl;

use OpenClassrooms\CodeGenerator\Generator\App\ViewModels\OldAbstractViewModelGenerator;
use OpenClassrooms\CodeGenerator\Generator\App\ViewModels\ViewModelAssemblerTraitGenerator;
use OpenClassrooms\CodeGenerator\Services\UseCaseClassObjectService;

/**
 * @author Romain Kuzniak <romain.kuzniak@openclassrooms.com>
 */
class ViewModelAssemblerTraitGeneratorImpl extends OldAbstractViewModelGenerator implements ViewModelAssemblerTraitGenerator
{
    /**
     * @var \OpenClassrooms\CodeGenerator\Services\UseCaseClassObjectService
     */
    private $useCaseClassObjectService;

    public function generate(string $className, array $parameters = []): array
    {
        $entityName = $this->getEntityNameFromClassName($className);
        $useCaseResponse = $this->useCaseClassObjectService->getUseCaseResponse($className);
        $viewModelAssemblerTrait = $this->viewModelClassObjectService->getViewModelAssemblerTrait($className);

        /** @var \OpenClassrooms\CodeGenerator\ClassObjects\ClassObject $vm */
        /** @var \OpenClassrooms\CodeGenerator\ClassObjects\ClassObject $vmDetail */
        /** @var \OpenClassrooms\CodeGenerator\ClassObjects\ClassObject $vmDetailImpl */
        [$vm, $vmDetail, $vmDetailImpl] = $this->viewModelClassObjectService->getViewModels($className);

        $viewModelAssemblerTraitContent = $this->render(
            '/App/ViewModels/ViewModelAssemblerTrait.php.twig',
            [
                'entityName'                            => lcfirst($entityName),
                'useCaseResponseClassName'              => $useCaseResponse->getClassName(),
                'useCaseResponseShortClassName'         => $useCaseResponse->getShortClassName(),
                'viewModelAssemblerTraitNamespace'      => $viewModelAssemblerTrait->getNamespace(),
                'viewModelAssemblerTraitShortClassName' => $viewModelAssemblerTrait->getShortClassName(),
                'viewModelShortClassName'               => $vm->getShortClassName(),
                'fields'                                => $this->fieldObjectService->getParentPublicClassFields($className),
            ]
        );

        return [$viewModelAssemblerTrait->getClassName() => $viewModelAssemblerTraitContent];
    }

    public function setUseCaseClassObjectService(UseCaseClassObjectService $useCaseClassObjectService)
    {
        $this->useCaseClassObjectService = $useCaseClassObjectService;
    }
}
