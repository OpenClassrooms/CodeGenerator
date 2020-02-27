<?php

declare(strict_types=1);

namespace OpenClassrooms\CodeGenerator\Generator\Api\Controller;

use OpenClassrooms\CodeGenerator\Entities\ControllerFileObjectFactory;
use OpenClassrooms\CodeGenerator\Entities\EntityFileObjectFactory;
use OpenClassrooms\CodeGenerator\Entities\UseCaseFileObjectFactory;
use OpenClassrooms\CodeGenerator\Entities\UseCaseRequestFileObjectFactory;
use OpenClassrooms\CodeGenerator\Entities\UseCaseResponseFileObjectFactory;
use OpenClassrooms\CodeGenerator\Entities\ViewModelFileObjectFactory;
use OpenClassrooms\CodeGenerator\Services\RoutingFactoryService;

trait CommonControllerFactoryTrait
{
    /**
     * @var ControllerFileObjectFactory
     */
    private $controllerFileObjectFactory;

    /**
     * @var EntityFileObjectFactory
     */
    private $entityFileObjectFactory;

    /**
     * @var RoutingFactoryService
     */
    private $routingFactoryService;

    /**
     * @var UseCaseFileObjectFactory
     */
    private $useCaseFileObjectFactory;

    /**
     * @var UseCaseRequestFileObjectFactory
     */
    private $useCaseRequestFileObjectFactory;

    /**
     * @var UseCaseResponseFileObjectFactory
     */
    private $useCaseResponseFileObjectFactory;

    /**
     * @var ViewModelFileObjectFactory
     */
    private $viewModelFileObjectFactory;

    public function setEntityFileObjectFactory(EntityFileObjectFactory $entityFileObjectFactory): void
    {
        $this->entityFileObjectFactory = $entityFileObjectFactory;
    }

    public function setRoutingFactoryService(RoutingFactoryService $routingFactoryService): void
    {
        $this->routingFactoryService = $routingFactoryService;
    }

    public function setUseCaseFileObjectFactory(UseCaseFileObjectFactory $useCaseFileObjectFactory): void
    {
        $this->useCaseFileObjectFactory = $useCaseFileObjectFactory;
    }

    public function setUseCaseRequestFileObjectFactory(
        UseCaseRequestFileObjectFactory $useCaseRequestFileObjectFactory
    ): void {
        $this->useCaseRequestFileObjectFactory = $useCaseRequestFileObjectFactory;
    }

    public function setUseCaseResponseFileObjectFactory(
        UseCaseResponseFileObjectFactory $useCaseResponseFileObjectFactory
    ): void {
        $this->useCaseResponseFileObjectFactory = $useCaseResponseFileObjectFactory;
    }

    public function setViewModelFileObjectFactory(ViewModelFileObjectFactory $viewModelFileObjectFactory): void
    {
        $this->viewModelFileObjectFactory = $viewModelFileObjectFactory;
    }

    public function setControllerFileObjectFactory(ControllerFileObjectFactory $controllerFileObjectFactory): void
    {
        $this->controllerFileObjectFactory = $controllerFileObjectFactory;
    }
}
