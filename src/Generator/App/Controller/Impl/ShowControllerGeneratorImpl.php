<?php declare(strict_types=1);

namespace OpenClassrooms\CodeGenerator\Generator\App\Controller\Impl;

use OpenClassrooms\CodeGenerator\Generator\App\Controller\OldAbstractControllerGenerator;
use OpenClassrooms\CodeGenerator\Services\EntityClassObjectService;

/**
 * @author Romain Kuzniak <romain.kuzniak@openclassrooms.com>
 */
class ShowControllerGeneratorImpl extends OldAbstractControllerGenerator
{
    /**
     * @var \OpenClassrooms\CodeGenerator\Services\EntityClassObjectService
     */
    private $entityClassObjectService;

    /**
     * @inheritdoc
     */
    public function generate(string $className, array $parameters = []): array
    {
        $admin = array_key_exists(self::ADMIN, $parameters) ? $parameters[self::ADMIN] : false;
        $entityName = $this->getEntityNameFromClassName($className);

        $exception = $this->entityClassObjectService->getEntityNotFoundException($className);
        $useCase = $this->useCaseClassObjectService->getGetUseCase($className);
        $useCaseRequestBuilder = $this->useCaseClassObjectService->getGetUseCaseRequestBuilder(
            $className
        );
        $useCaseResponse = $this->getInterfaceClassObjectFromClassName($className);

        $controller = $this->controllerClassObjectService->getShowController($className, $admin);
        [$showViewModel, $viewModelImpl] = $this->viewModelClassObjectService->getShowViewModels(
            $className
        );
        [$showViewModelBuilder, $viewModelBuilderImpl] = $this->viewModelClassObjectService->getShowViewModelBuilders(
            $className
        );
        $viewModelDetailAssembler = $this->viewModelClassObjectService->getViewModelDetailAssembler(
            $className
        );

        $content = $this->render(
            '/App/Controller/Web/ShowController.php.twig',
            [
                'controllerNamespace'                 => $controller->getNamespace(),
                'controllerShortClassName'            => $controller->getShortClassName(),
                'entityNameUC'                        => $entityName,
                'entityNameLC'                        => lcfirst($entityName),
                'useCaseResponseClassName'            => $useCaseResponse->getClassName(),
                'useCaseResponseShortClassName'       => $useCaseResponse->getShortClassName(),
                'showViewModelClassName'              => $showViewModel->getClassName(),
                'showViewModelShortClassName'         => $showViewModel->getShortClassName(),
                'showViewModelBuilderServiceName'     => $showViewModelBuilder->getServiceName(),
                'viewModelDetailAssemblerServiceName' => $viewModelDetailAssembler->getServiceName(),
                'exceptionClassName'                  => $exception->getClassName(),
                'exceptionShortClassName'             => $exception->getShortClassName(),
                'templateName'                        => '',
                'useCaseServiceName'                  => $useCase->getServiceName(),
                'useCaseRequestBuilderServiceName'    => $useCaseRequestBuilder->getServiceName(),

            ]
        );

        return [$controller->getClassName() => $content];
    }

    public function setEntityClassObjectService(EntityClassObjectService $entityClassObjectService)
    {
        $this->entityClassObjectService = $entityClassObjectService;
    }
}
