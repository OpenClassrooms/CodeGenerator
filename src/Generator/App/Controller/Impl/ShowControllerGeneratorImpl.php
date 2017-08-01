<?php

namespace OpenClassrooms\CodeGenerator\Generator\App\Controller\Impl;

use OpenClassrooms\CodeGenerator\Generator\AbstractGenerator;

/**
 * @author Romain Kuzniak <romain.kuzniak@openclassrooms.com>
 */
class ShowControllerGeneratorImpl extends AbstractGenerator
{
    /**
     * @inheritdoc
     */
    public function generate(string $useCaseResponseClassName, $admin = false): array
    {
        $entityName = $this->getEntityNameFromClassName($useCaseResponseClassName);

        $exception = $this->classObjectService->getEntityNotFoundException(
            $useCaseResponseClassName
        );
        $useCase = $this->classObjectService->getGetUseCase($useCaseResponseClassName);
        $useCaseRequestBuilder = $this->classObjectService->getGetUseCaseRequestBuilder(
            $useCaseResponseClassName
        );
        $useCaseResponse = $this->getInterfaceClassObjectFromClassName($useCaseResponseClassName);

        $controller = $this->classObjectService->getController($useCaseResponseClassName, $admin);
        list($showViewModel, $viewModelImpl) = $this->classObjectService->getShowViewModels(
            $useCaseResponseClassName
        );
        list($showViewModelBuilder, $viewModelBuilderImpl) = $this->classObjectService->getShowViewModelBuilders(
            $useCaseResponseClassName
        );
        $viewModelDetailAssembler = $this->classObjectService->getViewModelDetailAssembler($useCaseResponseClassName);

        $content = $this->render(
            'Controller/Web/ShowController.php.twig',
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

}
