<?php

namespace OpenClassrooms\CodeGenerator\Generator\App\Controller\Impl;

use Doctrine\Common\Inflector\Inflector;
use OpenClassrooms\CodeGenerator\Generator\AbstractGenerator;

/**
 * @author Romain Kuzniak <romain.kuzniak@openclassrooms.com>
 */
class ListControllerGeneratorImpl extends AbstractGenerator
{
    /**
     * @inheritdoc
     */
    public function generate(string $useCaseResponseClassName, $admin = false): array
    {
        $entityName = $this->getEntityNameFromClassName($useCaseResponseClassName);
        $entitiesName = Inflector::pluralize($entityName);

        $useCase = $this->classObjectService->getGetAllUseCase($useCaseResponseClassName);
        $useCaseRequestBuilder = $this->classObjectService->getGetAllUseCaseRequestBuilder($useCaseResponseClassName);
        $useCaseResponse = $this->getInterfaceClassObjectFromClassName($useCaseResponseClassName);

        $controller = $this->classObjectService->getListController($useCaseResponseClassName, $admin);
        list($listViewModel, $listViewModelImpl) = $this->classObjectService->getListViewModels(
            $useCaseResponseClassName
        );
        list($listViewModelBuilder, $listViewModelBuilderImpl) = $this->classObjectService->getListViewModelBuilders(
            $useCaseResponseClassName
        );
        $viewModelListItemAssembler = $this->classObjectService->getViewModelListItemAssembler($useCaseResponseClassName);

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
