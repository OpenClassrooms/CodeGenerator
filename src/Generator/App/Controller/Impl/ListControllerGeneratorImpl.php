<?php

namespace OpenClassrooms\CodeGenerator\Generator\App\Controller\Impl;

use Doctrine\Common\Inflector\Inflector;
use OpenClassrooms\CodeGenerator\Generator\App\Controller\AbstractControllerGenerator;

/**
 * @author Romain Kuzniak <romain.kuzniak@openclassrooms.com>
 */
class ListControllerGeneratorImpl extends AbstractControllerGenerator
{
    /**
     * @inheritdoc
     */
    public function generate(string $useCaseResponseClassName, $admin = false): array
    {
        $entityName = $this->getEntityNameFromClassName($useCaseResponseClassName);
        $entitiesName = Inflector::pluralize($entityName);

        $useCase = $this->useCaseClassObjectService->getGetAllUseCase($useCaseResponseClassName);
        $useCaseRequestBuilder = $this->useCaseClassObjectService->getGetAllUseCaseRequestBuilder(
            $useCaseResponseClassName
        );
        $useCaseResponse = $this->getInterfaceClassObjectFromClassName($useCaseResponseClassName);

        $controller = $this->controllerClassObjectService->getListController($useCaseResponseClassName, $admin);
        list($listViewModel, $listViewModelImpl) = $this->viewModelClassObjectService->getListViewModels(
            $useCaseResponseClassName
        );
        list($listViewModelBuilder, $listViewModelBuilderImpl) = $this->viewModelClassObjectService->getListViewModelBuilders(
            $useCaseResponseClassName
        );
        $viewModelListItemAssembler = $this->viewModelClassObjectService->getViewModelListItemAssembler(
            $useCaseResponseClassName
        );

        $content = $this->render(
            '/App/Controller/Web/ListController.php.twig',
            [
                'controllerNamespace' => $controller->getNamespace(),
                'controllerShortClassName' => $controller->getShortClassName(),
                'entitiesNameUC' => $entitiesName,
                'entitiesNameLC' => lcfirst($entitiesName),
                'listViewModelClassName' => $listViewModel->getClassName(),
                'listViewModelShortClassName' => $listViewModel->getShortClassName(),
                'listViewModelBuilderServiceName' => $listViewModelBuilder->getServiceName(),
                'viewModelListItemAssemblerServiceName' => $viewModelListItemAssembler->getServiceName(),
                'routeName' => $controller->getRouteName(),
                'templateName' => '',
                'useCaseServiceName' => $useCase->getServiceName(),
                'useCaseRequestBuilderServiceName' => $useCaseRequestBuilder->getServiceName(),
            ]
        );

        return [$controller->getClassName() => $content];
    }
}
