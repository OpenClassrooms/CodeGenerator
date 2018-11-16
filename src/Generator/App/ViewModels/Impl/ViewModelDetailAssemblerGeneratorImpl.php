<?php declare(strict_types=1);

namespace OpenClassrooms\CodeGenerator\Generator\App\ViewModels\Impl;

use OpenClassrooms\CodeGenerator\Generator\App\ViewModels\OldAbstractViewModelGenerator;
use OpenClassrooms\CodeGenerator\Generator\App\ViewModels\ViewModelAssemblerTraitGenerator;
use OpenClassrooms\CodeGenerator\Services\UseCaseClassObjectService;

/**
 * @author Romain Kuzniak <romain.kuzniak@openclassrooms.com>
 */
class ViewModelDetailAssemblerGeneratorImpl extends OldAbstractViewModelGenerator
{
    /**
     * @var \OpenClassrooms\CodeGenerator\Services\UseCaseClassObjectService
     */
    private $useCaseClassObjectService;

    /**
     * @var \OpenClassrooms\CodeGenerator\Generator\App\ViewModels\ViewModelAssemblerTraitGenerator
     */
    private $viewModelAssemblerTraitGenerator;

    public function generate(string $className, array $parameters = []): array
    {
        $entityName = $this->getEntityNameFromClassName($className);
        $useCaseResponse = $this->useCaseClassObjectService->getUseCaseDetailResponse($className);

        $viewModelAssemblerTrait = $this->viewModelClassObjectService->getViewModelAssemblerTrait($className);
        $viewModelDetailAssembler = $this->viewModelClassObjectService->getViewModelDetailAssembler($className);
        $viewModelDetailAssemblerImpl = $this->viewModelClassObjectService->getViewModelDetailAssemblerImpl($className);

        /** @var \OpenClassrooms\CodeGenerator\OldClassObjects\ClassObject $vm */
        /** @var \OpenClassrooms\CodeGenerator\OldClassObjects\ClassObject $viewModelDetail */
        /** @var \OpenClassrooms\CodeGenerator\OldClassObjects\ClassObject $viewModelDetailImpl */
        [$vm, $viewModelDetail, $viewModelDetailImpl] = $this->viewModelClassObjectService->getViewModels(
            $className
        );

        $viewModelDetailAssemblerContent = $this->render(
            '/App/ViewModels/ViewModelDetailAssembler.php.twig',
            [
                'viewModelDetailAssemblerNamespace'      => $viewModelDetailAssembler->getNamespace(),
                'viewModelDetailAssemblerShortClassName' => $viewModelDetailAssembler->getShortClassName(),
                'viewModelDetailShortClassName'          => $viewModelDetail->getShortClassName(),
                'useCaseResponseClassName'               => $useCaseResponse->getClassName(),
                'useCaseResponseShortClassName'          => $useCaseResponse->getShortClassName(),
                'entityName'                             => lcfirst($entityName),
            ]
        );

        $viewModelDetailAssemblerImplContent = $this->render(
            '/App/ViewModels/Impl/ViewModelDetailAssemblerImpl.php.twig',
            [
                'viewModelDetailAssemblerImplNamespace'      => $viewModelDetailAssemblerImpl->getNamespace(),
                'viewModelDetailAssemblerImplShortClassName' => $viewModelDetailAssemblerImpl->getShortClassName(),
                'viewModelDetailAssemblerClassName'          => $viewModelDetailAssembler->getClassName(),
                'viewModelDetailAssemblerShortClassName'     => $viewModelDetailAssembler->getShortClassName(),
                'viewModelDetailClassName'                   => $viewModelDetail->getClassName(),
                'viewModelDetailShortClassName'              => $viewModelDetail->getShortClassName(),
                'viewModelDetailImplClassName'               => $viewModelDetailImpl->getClassName(),
                'viewModelDetailImplShortClassName'          => $viewModelDetailImpl->getShortClassName(),
                'viewModelAssemblerTraitClassName'           => $viewModelAssemblerTrait->getClassName(),
                'viewModelAssemblerTraitShortClassName'      => $viewModelAssemblerTrait->getShortClassName(),
                'useCaseResponseClassName'                   => $useCaseResponse->getClassName(),
                'useCaseResponseShortClassName'              => $useCaseResponse->getShortClassName(),
                'entityName'                                 => lcfirst($entityName),

            ]
        );

        $generatedClasses = [];
        $generate = $this->viewModelAssemblerTraitGenerator->generate($className);
        $generatedClasses = array_merge($generatedClasses, $generate);
        $generatedClasses[$viewModelDetailAssembler->getClassName()] = $viewModelDetailAssemblerContent;
        $generatedClasses[$viewModelDetailAssemblerImpl->getClassName()] = $viewModelDetailAssemblerImplContent;

        return $generatedClasses;
    }

    public function setUseCaseClassObjectService(UseCaseClassObjectService $useCaseClassObjectService)
    {
        $this->useCaseClassObjectService = $useCaseClassObjectService;
    }

    public function setViewModelAssemblerTraitGenerator(
        ViewModelAssemblerTraitGenerator $viewModelAssemblerTraitGenerator
    ) {
        $this->viewModelAssemblerTraitGenerator = $viewModelAssemblerTraitGenerator;
    }
}
