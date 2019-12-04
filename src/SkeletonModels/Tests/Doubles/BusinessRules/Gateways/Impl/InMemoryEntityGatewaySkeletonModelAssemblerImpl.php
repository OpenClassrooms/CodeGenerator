<?php declare(strict_types=1);

namespace OpenClassrooms\CodeGenerator\SkeletonModels\Tests\Doubles\BusinessRules\Gateways\Impl;

use OpenClassrooms\CodeGenerator\Entities\Object\FileObject;
use OpenClassrooms\CodeGenerator\SkeletonModels\Tests\Doubles\BusinessRules\Gateways\InMemoryEntityGatewaySkeletonModel;
use OpenClassrooms\CodeGenerator\SkeletonModels\Tests\Doubles\BusinessRules\Gateways\InMemoryEntityGatewaySkeletonModelAssembler;
use OpenClassrooms\CodeGenerator\Utility\NameUtility;
use OpenClassrooms\CodeGenerator\Utility\StringUtility;

/**
 * @author arnaud lefevre <arnaud.lefevre@openclassrooms.com>
 */
class InMemoryEntityGatewaySkeletonModelAssemblerImpl implements InMemoryEntityGatewaySkeletonModelAssembler
{
    private $entityUtilClassName;

    public function create(
        FileObject $entityFileObject,
        FileObject $entityGatewayFileObject,
        FileObject $entityNotFoundExceptionFileObject,
        FileObject $inMemoryEntityGatewayFileObject
    ): InMemoryEntityGatewaySkeletonModel {
        $skeletonModel = new InMemoryEntityGatewaySkeletonModelImpl();

        $skeletonModel->namespace = $inMemoryEntityGatewayFileObject->getNamespace();
        $skeletonModel->shortName = $inMemoryEntityGatewayFileObject->getShortName();
        $skeletonModel->entityArgument = lcfirst($entityFileObject->getShortName());
        $skeletonModel->entityIdArgument = NameUtility::creatEntityIdName($entityFileObject->getShortName());
        $skeletonModel->entityClassName = $entityFileObject->getClassName();
        $skeletonModel->entityShortName = $entityFileObject->getShortName();
        $skeletonModel->entityGatewayClassName = $entityGatewayFileObject->getClassName();
        $skeletonModel->entityGatewayShortName = $entityGatewayFileObject->getShortName();
        $skeletonModel->entityNotFoundExceptionClassName = $entityNotFoundExceptionFileObject->getClassName();
        $skeletonModel->entityNotFoundExceptionShortName = $entityNotFoundExceptionFileObject->getShortName();
        $skeletonModel->entityUtilClassName = $this->entityUtilClassName;
        $skeletonModel->pluralEntityShortName = lcfirst(StringUtility::pluralize($entityFileObject->getShortName()));

        return $skeletonModel;
    }

    public function setEntityUtilClassName($entityUtilClassName): void
    {
        $this->entityUtilClassName = $entityUtilClassName;
    }
}
