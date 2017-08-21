<?php

namespace OpenClassrooms\CodeGenerator\Generator\App\Controller\Impl;

use OpenClassrooms\CodeGenerator\Generator\App\Controller\AbstractControllerGenerator;
use OpenClassrooms\CodeGenerator\Services\ClassObjectService;

/**
 * @author Romain Kuzniak <romain.kuzniak@openclassrooms.com>
 */
class ShowControllerGeneratorImpl extends AbstractControllerGenerator
{
    /**
     * @var \OpenClassrooms\CodeGenerator\Services\ClassObjectService
     */
    private $classObjectService;

    /**
     * @inheritdoc
     */
    public function generate(string $useCaseResponseClassName, $admin = false): array
    {
        $entityName = $this->getEntityNameFromClassName($useCaseResponseClassName);

        $exception = $this->classObjectService->getEntityNotFoundException($useCaseResponseClassName);
        $useCase = $this->useCaseClassObjectService->getGetUseCase($useCaseResponseClassName);
        $useCaseRequestBuilder = $this->useCaseClassObjectService->getGetUseCaseRequestBuilder(
            $useCaseResponseClassName
        );
        $useCaseResponse = $this->getInterfaceClassObjectFromClassName($useCaseResponseClassName);

        $controller = $this->controllerClassObjectService->getShowController($useCaseResponseClassName, $admin);
        list($showViewModel, $viewModelImpl) = $this->viewModelClassObjectService->getShowViewModels(
            $useCaseResponseClassName
        );
        list($showViewModelBuilder, $viewModelBuilderImpl) = $this->viewModelClassObjectService->getShowViewModelBuilders(
            $useCaseResponseClassName
        );
        $viewModelDetailAssembler = $this->viewModelClassObjectService->getViewModelDetailAssembler(
            $useCaseResponseClassName
        );

        $content = $this->render(
            '/App/Controller/Web/ShowController.php.twig',
            [
                'controllerNamespace' => $controller->getNamespace(),
                'controllerShortClassName' => $controller->getShortClassName(),
                'entityNameUC' => $entityName,
                'entityNameLC' => lcfirst($entityName),
                'useCaseResponseClassName' => $useCaseResponse->getClassName(),
                'useCaseResponseShortClassName' => $useCaseResponse->getShortClassName(),
                'showViewModelClassName' => $showViewModel->getClassName(),
                'showViewModelShortClassName' => $showViewModel->getShortClassName(),
                'showViewModelBuilderServiceName' => $showViewModelBuilder->getServiceName(),
                'viewModelDetailAssemblerServiceName' => $viewModelDetailAssembler->getServiceName(),
                'exceptionClassName' => $exception->getClassName(),
                'exceptionShortClassName' => $exception->getShortClassName(),
                'templateName' => '',
                'useCaseServiceName' => $useCase->getServiceName(),
                'useCaseRequestBuilderServiceName' => $useCaseRequestBuilder->getServiceName(),

            ]
        );

        return [$controller->getClassName() => $content];
    }

    public function setClassObjectService(ClassObjectService $classObjectService)
    {
        $this->classObjectService = $classObjectService;
    }
}
