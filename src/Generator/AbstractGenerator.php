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
    protected function getParentAndChildPublicClassFields(string $className): array
    {
        $classFields = array_merge(
            $this->fieldObjectService->getParentPublicClassFields($className),
            $this->fieldObjectService->getPublicClassFields($className)
        );

        usort($classFields, array($this, "orderClassField"));

        return $classFields;
    }

    /**
     * @return array|FieldObject[]
     */
    protected function getPublicClassFields(string $className): array
    {
        $classFields = $this->fieldObjectService->getPublicClassFields($className);

        usort($classFields, array($this, "orderClassField"));

        return $classFields;
    }

    protected function insertFileObject(FileObject $viewModelFileObject): void
    {
        $this->fileObjectGateway->insert($viewModelFileObject);
    }

    private function orderClassField(FieldObject $a, FieldObject $b): int
    {
        $al = strtolower($a->getAccessor() ?? $a->getName());
        $bl = strtolower($b->getAccessor() ?? $b->getName());
        if ($al == $bl) {
            return 0;
        }

        return ($al > $bl) ? +1 : -1;
    }

    /* Ceci est une fonction de comparaison statique */

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
