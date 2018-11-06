<?php declare(strict_types=1);

namespace OpenClassrooms\CodeGenerator\Generator\Api\ViewModels;

use OpenClassrooms\CodeGenerator\FileObjects\FileObject;
use OpenClassrooms\CodeGenerator\FileObjects\FileObjectFactory;
use OpenClassrooms\CodeGenerator\FileObjects\FileObjectType;
use OpenClassrooms\CodeGenerator\Gateway\FileObjectGateway;
use OpenClassrooms\CodeGenerator\Generator\Api\ViewModels\Request\ViewModelGeneratorRequest;
use OpenClassrooms\CodeGenerator\Generator\Generator;
use OpenClassrooms\CodeGenerator\Generator\GeneratorRequest;
use OpenClassrooms\CodeGenerator\Generator\SkeletonModels\ViewModels\ViewModel\ViewModelDetailAssembler;
use OpenClassrooms\CodeGenerator\Services\FieldObjectService;

/**
 * @author Samuel Gomis <samuel.gomis@external.openclassrooms.com>
 */
class ViewModelGenerator implements Generator
{
    /**
     * @var \Twig_Environment
     */
    private $templating;

    /**
     * @var FileObjectGateway
     */
    private $fileObjectGateway;

    /**
     * @var FileObjectFactory
     */
    private $fileObjectFactory;

    /**
     * @var ViewModelDetailAssembler
     */
    private $viewModelDetailAssembler;

    /**
     * @var FieldObjectService
     */
    private $fieldObjectService;

    /**
     * @param ViewModelGeneratorRequest $request
     */
    public function generate(GeneratorRequest $request): FileObject
    {
        $fileObject = new FileObject();
        $fileObject->setClassName($request->getClassName());

        $skeletonModel = $this->getSkeletonModel($fileObject);

        $fileObject->setContent(
            $this->render('Api/ViewModels/ViewModel.php.twig', ['skeletonModel' => $skeletonModel])
        );

        $this->fileObjectGateway->insert($fileObject)->flush();

        return $fileObject;
    }

    private function getSkeletonModel(FileObject $fileObject)
    {
        // get public fields
        // get public accessors

        $viewModelAssembler = $this->fileObjectFactory->create(
            FileObjectType::API_VIEW_MODEL,
            $fileObject->getClassName()
        );

        $this->setFieldsToViewModel($fileObject->getClassName(), $viewModelAssembler);

        $skeletonModel = $this->viewModelDetailAssembler->create($viewModelAssembler);

        return $skeletonModel;
    }

    private function setFieldsToViewModel(string $className, FileObject $viewModelAssembler)
    {
        $viewModelAssembler->setFields(
            $this->fieldObjectService->getParentPublicClassFields($className)
        );
//        $viewModelAssembler->setFields($this->fieldObjectService->getPublicClassFields($className));
//        $viewModelAssembler->setFields($this->fieldObjectService->getProtectedClassFields($className));
    }

    /**
     * @throws \Twig_Error_Loader
     * @throws \Twig_Error_Runtime
     * @throws \Twig_Error_Syntax
     */
    private function render(string $template, array $parameters): string
    {
        return $this->templating->render($template, $parameters);
    }

    public function setFileObjectGateway(FileObjectGateway $fileObjectGateway)
    {
        $this->fileObjectGateway = $fileObjectGateway;
    }

    public function setFileObjectFactory(FileObjectFactory $fileObjectFactory)
    {
        $this->fileObjectFactory = $fileObjectFactory;
    }

    public function setViewModelDetailAssembler(ViewModelDetailAssembler $viewModelDetailAssembler)
    {
        $this->viewModelDetailAssembler = $viewModelDetailAssembler;
    }

    public function setTemplating(\Twig_Environment $templating): void
    {
        $this->templating = $templating;
    }

    public function setFieldObjectService(FieldObjectService $fieldObjectService): void
    {
        $this->fieldObjectService = $fieldObjectService;
    }

}
