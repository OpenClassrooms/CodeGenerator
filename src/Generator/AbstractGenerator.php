<?php declare(strict_types=1);

namespace OpenClassrooms\CodeGenerator\Generator;

use OpenClassrooms\CodeGenerator\FileObjects\FieldObject;
use OpenClassrooms\CodeGenerator\FileObjects\FileObject;
use OpenClassrooms\CodeGenerator\Gateways\FileObject\FileObjectGateway;
use OpenClassrooms\CodeGenerator\Services\FieldObjectService;
use OpenClassrooms\CodeGenerator\Utility\ClassNameUtility;

/**
 * @author Samuel Gomis <gomis.samuel@external.openclassrooms.com>
 */
abstract class AbstractGenerator implements Generator
{
    use ClassNameUtility;

    /**
     * @var FieldObjectService
     */
    private $fieldObjectService;

    /**
     * @var FileObjectGateway
     */
    private $fileObjectGateway;

    /**
     * @var \Twig_Environment
     */
    private $templating;

    /**
     * @return array|FieldObject[]
     */
    protected function getPublicClassFields(string $className): array
    {
        return $this->fieldObjectService->getPublicClassFields($className);
    }

    protected function insertFileObject(FileObject $viewModelFileObject): void
    {
        $this->fileObjectGateway->insert($viewModelFileObject);
    }

    protected function render(string $template, array $parameters): string
    {
        return $this->templating->render($template, $parameters);
    }

    public function setFieldObjectService(FieldObjectService $fieldObjectService): void
    {
        $this->fieldObjectService = $fieldObjectService;
    }

    public function setFileObjectGateway(FileObjectGateway $fileObjectGateway)
    {
        $this->fileObjectGateway = $fileObjectGateway;
    }

    public function setTemplating(\Twig_Environment $templating): void
    {
        $this->templating = $templating;
    }
}
