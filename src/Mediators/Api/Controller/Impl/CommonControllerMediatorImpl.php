<?php

declare(strict_types=1);

namespace OpenClassrooms\CodeGenerator\Mediators\Api\Controller\Impl;

use OpenClassrooms\CodeGenerator\Entities\Object\FileObject;
use OpenClassrooms\CodeGenerator\Gateways\FileObject\FileObjectGateway;
use OpenClassrooms\CodeGenerator\Mediators\Api\Controller\CommonControllerMediator;
use OpenClassrooms\CodeGenerator\Mediators\Api\Controller\ControllerMediator;
use OpenClassrooms\CodeGenerator\Mediators\Api\Models\ModelMediator;
use OpenClassrooms\CodeGenerator\Mediators\Args;
use OpenClassrooms\CodeGenerator\Mediators\ClassType;
use OpenClassrooms\CodeGenerator\Mediators\Options;

class CommonControllerMediatorImpl implements CommonControllerMediator
{
    /** @var ModelMediator */
    private $modelMediator;

    /** @var ControllerMediator */
    private $controllerMediator;

    /** @var FileObjectGateway */
    private $fileObjectGateway;

    /**
     * @return FileObject[]
     */
    public function mediate(array $args = [], array $options = []): array
    {
        $className = $args[Args::CLASS_NAME];

        $fileObjects = [];
        switch ($args[Args::TYPE]) {
            case ClassType::DELETE:
                $fileObjects[] = $this->controllerMediator->generateDeleteEntityControllerGenerator($className);
                break;
            case ClassType::GET:
                $fileObjects[] = $this->controllerMediator->generateGetEntityControllerGenerator($className);
                break;
            case ClassType::GET_ALL:
                $fileObjects[] = $this->controllerMediator->generateGetEntitiesControllerGenerator($className);
                break;
            case ClassType::PATCH:
                $fileObjects[] = $this->controllerMediator->generatePatchEntityControllerGenerator($className);
                $fileObjects[] = $this->modelMediator->generateEntityModelTraitGenerator($className);
                $fileObjects[] = $this->modelMediator->generatePatchEntityModelGenerator($className);
                break;
            case ClassType::POST:
                $fileObjects[] = $this->controllerMediator->generatePostEntityControllerGenerator($className);
                $fileObjects[] = $this->modelMediator->generateEntityModelTraitGenerator($className);
                $fileObjects[] = $this->modelMediator->generatePostEntityModelGenerator($className);
                break;
            case ClassType::PUT:
                $fileObjects[] = $this->modelMediator->generatePutEntityModelGenerator($className);
                break;
            default:
                throw new \ErrorException("Invalid type send");
        }

        if (false === $options[Options::DUMP]) {
            $this->fileObjectGateway->flush();
        }

        return $fileObjects;
    }

    public function setModelMediator(ModelMediator $modelMediator): void
    {
        $this->modelMediator = $modelMediator;
    }

    public function setControllerMediator(ControllerMediator $controllerMediator): void
    {
        $this->controllerMediator = $controllerMediator;
    }

    public function setFileObjectGateway(FileObjectGateway $fileObjectGateway): void
    {
        $this->fileObjectGateway = $fileObjectGateway;
    }
}
