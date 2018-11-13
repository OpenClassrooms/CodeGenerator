<?php declare(strict_types=1);

namespace OpenClassrooms\CodeGenerator\Generator\Api;

use OpenClassrooms\CodeGenerator\FileObjects\FileObject;
use OpenClassrooms\CodeGenerator\FileObjects\UseCaseResponseFileObjectFactory;
use OpenClassrooms\CodeGenerator\FileObjects\ViewModelFileObjectFactory;
use OpenClassrooms\CodeGenerator\Gateways\FileObject\FileObjectGateway;
use OpenClassrooms\CodeGenerator\Generator\Generator;
use OpenClassrooms\CodeGenerator\Services\FieldObjectService;
use OpenClassrooms\CodeGenerator\Utility\ClassNameUtility;

/**
 * @author Samuel Gomis <gomis.samuel@external.openclassrooms.com>
 */
abstract class AbstractViewModelGenerator implements Generator
{
    use ClassNameUtility;

    /**
     * @var FieldObjectService
     */
    protected $fieldObjectService;

    /**
     * @var FileObjectGateway
     */
    protected $fileObjectGateway;

    /**
     * @var \Twig_Environment
     */
    protected $templating;

    /**
     * @var UseCaseResponseFileObjectFactory
     */
    protected $useCaseResponseFileObjectFactory;

    /**
     * @var ViewModelFileObjectFactory
     */
    protected $viewModelFileObjectFactory;

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

    public function setUseCaseResponseFileObjectFactory(
        UseCaseResponseFileObjectFactory $useCaseResponseFileObjectFactory
    )
    {
        $this->useCaseResponseFileObjectFactory = $useCaseResponseFileObjectFactory;
    }

    public function setViewModelFileObjectFactory(ViewModelFileObjectFactory $viewModelFileObjectFactory)
    {
        $this->viewModelFileObjectFactory = $viewModelFileObjectFactory;
    }
}
