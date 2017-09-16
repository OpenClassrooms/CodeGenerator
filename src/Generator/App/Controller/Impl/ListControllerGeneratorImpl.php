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
    public function generate(string $className, array $parameters = []): array
    {
        $admin = array_key_exists(self::ADMIN, $parameters) ? $parameters[self::ADMIN] : false;
        $entityName = $this->getEntityNameFromClassName($className);
        $entitiesName = Inflector::pluralize($entityName);

        $useCase = $this->useCaseClassObjectService->getGetAllUseCase($className);
        $useCaseRequestBuilder = $this->useCaseClassObjectService->getGetAllUseCaseRequestBuilder($className);

        $controller = $this->controllerClassObjectService->getListController($className, $admin);
        list($listViewModel, $listViewModelImpl) = $this->viewModelClassObjectService->getListViewModels($className);
        list($listViewModelBuilder, $listViewModelBuilderImpl) = $this->viewModelClassObjectService->getListViewModelBuilders(
            $className
        );
        $viewModelListItemAssembler = $this->viewModelClassObjectService->getViewModelListItemAssembler($className);

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
