<?php declare(strict_types=1);

namespace OpenClassrooms\CodeGenerator\Generator;

use OpenClassrooms\CodeGenerator\Entities\FieldObject;
use OpenClassrooms\CodeGenerator\Entities\FileObject;
use OpenClassrooms\CodeGenerator\Gateways\FileObject\FileObjectGateway;
use OpenClassrooms\CodeGenerator\Services\Impl\TemplatingServiceImpl;
use OpenClassrooms\CodeGenerator\Services\TemplatingService;
use OpenClassrooms\CodeGenerator\Utility\FieldObjectUtility;
use OpenClassrooms\CodeGenerator\Utility\FileObjectUtility;
use OpenClassrooms\CodeGenerator\Utility\StubUtility;

/**
 * @author Samuel Gomis <samuel.gomis@external.openclassrooms.com>
 */
abstract class AbstractGenerator implements Generator
{
    /**
     * @var string
     */
    protected $baseNamespace;

    /**
     * @var string
     */
    protected $domain;

    /**
     * @var string
     */
    protected $entity;

    /**
     * @var FileObjectGateway
     */
    protected $fileObjectGateway;

    /**
     * @var TemplatingServiceImpl
     */
    private $templating;

    public function setFileObjectGateway(FileObjectGateway $fileObjectGateway)
    {
        $this->fileObjectGateway = $fileObjectGateway;
    }

    public function setTemplating(TemplatingService $templating): void
    {
        $this->templating = $templating;
    }

    /**
     * @return array|FieldObject[]
     */
    protected function getParentAndChildPublicClassFields(string $className): array
    {
        $classFields = array_merge(
            FieldObjectUtility::getParentPublicClassFields($className),
            FieldObjectUtility::getPublicClassFields($className)
        );

        return $classFields;
    }

    /**
     * @return array|FieldObject[]
     */
    protected function getPublicClassFields(string $className): array
    {
        return FieldObjectUtility::getPublicClassFields($className);
    }

    protected function insertFileObject(FileObject $fileObject): void
    {
        $fileObject = StubUtility::incrementSuffix($fileObject, $this->fileObjectGateway->findAll());

        $this->fileObjectGateway->insert($fileObject);
    }

    protected function render(string $template, array $parameters): string
    {
        return $this->templating->render($template, $parameters);
    }

    /**
     * @param string[] $fields
     *
     * @return FieldObject[]
     */
    protected function getSelectedFields(
        string $entityClassName,
        array $fields
    ): array {
        $fieldObjects = $this->getProtectedClassFields($entityClassName);
        foreach ($fieldObjects as $key => $fieldObject) {
            if (!in_array($fieldObject->getName(), $fields)) {
                unset($fieldObjects[$key]);
            }
        }

        return $fieldObjects;
    }

    /**
     * @return array|FieldObject[]
     */
    protected function getProtectedClassFields(string $className): array
    {
        return FieldObjectUtility::getProtectedClassFields($className);
    }

    protected function initFileObjectParameter(string $entityClassName): void
    {
        [
            $this->baseNamespace,
            $this->domain,
            $this->entity,
        ] = FileObjectUtility::getBaseNamespaceDomainAndEntityNameFromClassName(
            $entityClassName
        );
    }
}
