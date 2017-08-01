<?php

namespace OpenClassrooms\CodeGenerator\Generator\App\Controller\Impl;

use OpenClassrooms\CodeGenerator\Generator\AbstractGenerator;

/**
 * @author Romain Kuzniak <romain.kuzniak@openclassrooms.com>
 */
class GetControllerGeneratorImpl extends AbstractGenerator
{
    /**
     * @throws \Twig_Error_Loader
     * @throws \Twig_Error_Runtime
     * @throws \Twig_Error_Syntax
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

        /** @var \OpenClassrooms\CodeGenerator\ClassObjects\ClassObject $viewModelAssembler */
        $viewModelAssembler = $this->classObjectService->getViewModelDetailAssembler($useCaseResponseClassName);

        /** @var \OpenClassrooms\CodeGenerator\ClassObjects\ClassObject $viewModelDetail */
        list($viewModel, $viewModelDetail, $viewModelDetailImpl) = $this->classObjectService->getViewModels(
            $useCaseResponseClassName
        );

        $content = $this->render(
            'Controller/Web/GetController.php.twig',
            [
                'controllerNamespace' => $controller->getNamespace(),
                'controllerShortClassName' => $controller->getShortClassName(),
                'entityNameUC' => $entityName,
                'entityNameLC' => lcfirst($entityName),
                'useCaseResponseClassName' => $useCaseResponse->getClassName(),
                'useCaseResponseShortClassName' => $useCaseResponse->getShortClassName(),
                'viewModelClassName' => $viewModelDetail->getClassName(),
                'viewModelShortClassName' => $viewModelDetail->getShortClassName(),
                'viewModelAssemblerServiceName' => $viewModelAssembler->getServiceName(),
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
