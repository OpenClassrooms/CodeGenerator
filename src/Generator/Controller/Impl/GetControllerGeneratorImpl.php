<?php

namespace OpenClassrooms\CodeGenerator\Generator\Controller\Impl;

use OpenClassrooms\CodeGenerator\Generator\Generator;
use OpenClassrooms\CodeGenerator\Utility\NamespaceConverter;

/**
 * @author Romain Kuzniak <romain.kuzniak@openclassrooms.com>
 */
class GetControllerGeneratorImpl extends Generator
{
    /**
     * @throws \Twig_Error_Loader
     * @throws \Twig_Error_Runtime
     * @throws \Twig_Error_Syntax
     */
    public function generate(string $useCaseResponseClassName, $admin = false): string
    {
        $entityName = NamespaceConverter::getEntityNameFromClassName($useCaseResponseClassName);
        $exception = NamespaceConverter::getEntityNotFoundExceptionClassObjectsFromClassName($useCaseResponseClassName);
        $useCase = NamespaceConverter::getGetUseCaseClassObjectFromClassName($useCaseResponseClassName);
        $useCaseRequestBuilder = NamespaceConverter::getGetUseCaseRequestBuilderClassObjectFromClassName($useCaseResponseClassName);
        $useCaseResponse = NamespaceConverter::getInterfaceClassObjectFromClassName($useCaseResponseClassName);
        $controller = NamespaceConverter::getControllerClassObjectFromClassName($useCaseResponseClassName, $admin);
        /** @var \OpenClassrooms\CodeGenerator\ClassObjects\ClassObject $viewModelAssemblerInterface */
        list($viewModelAssemblerInterface, $viewModelAssemblerImpl) = NamespaceConverter::getViewModelAssemblerClassObjectsFromClassName(
            $useCaseResponseClassName
        );
        /** @var \OpenClassrooms\CodeGenerator\ClassObjects\ClassObject $viewModel */
        list($viewModel, $viewModelImpl) = NamespaceConverter::getViewModelClassObjectsFromClassName(
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
                'viewModelClassName' => $viewModel->getClassName(),
                'viewModelShortClassName' => $viewModel->getShortClassName(),
                'viewModelAssemblerServiceName' => $viewModelAssemblerInterface->getServiceName(),
                'exceptionClassName' => $exception->getClassName(),
                'exceptionShortClassName' => $exception->getShortClassName(),
                'templateName' => '',
                'useCaseServiceName' => $useCase->getServiceName(),
                'useCaseRequestBuilderServiceName' => $useCaseRequestBuilder->getServiceName(),

            ]
        );

        return $content;
    }
}
