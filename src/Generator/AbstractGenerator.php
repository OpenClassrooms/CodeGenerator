<?php declare(strict_types=1);

namespace OpenClassrooms\CodeGenerator\Generator;

use OpenClassrooms\CodeGenerator\Entities\FieldObject;
use OpenClassrooms\CodeGenerator\Entities\FileObject;
use OpenClassrooms\CodeGenerator\Gateways\FileObject\FileObjectGateway;
use OpenClassrooms\CodeGenerator\Services\FieldObjectService;
use OpenClassrooms\CodeGenerator\Services\Impl\TemplatingServiceImpl;
use OpenClassrooms\CodeGenerator\Services\TemplatingService;

/**
 * @author Samuel Gomis <samuel.gomis@external.openclassrooms.com>
 */
abstract class AbstractGenerator implements Generator
{
    /**
     * @var FieldObjectService
     */
    private $fieldObjectService;

    /**
     * @var FileObjectGateway
     */
    private $fileObjectGateway;

    /**
     * @var TemplatingServiceImpl
     */
    private $templating;

    public function setFieldObjectService(FieldObjectService $fieldObjectService): void
    {
        $this->fieldObjectService = $fieldObjectService;
    }

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
            $this->fieldObjectService->getParentPublicClassFields($className),
            $this->fieldObjectService->getPublicClassFields($className)
        );

        return $classFields;
    }

    /**
     * @return array|FieldObject[]
     */
    protected function getPublicClassFields(string $className): array
    {
        return $this->fieldObjectService->getPublicClassFields($className);
    }

    /**
     * @return array|FieldObject[]
     */
    protected function getProtectedClassFields(string $className): array
    {
        return $this->fieldObjectService->getProtectedClassFields($className);
    }

    protected function insertFileObject(FileObject $viewModelFileObject): void
    {
        $this->fileObjectGateway->insert($viewModelFileObject);
    }

    protected function render(string $template, array $parameters): string
    {
        return $this->templating->render($template, $parameters);
    }
}
