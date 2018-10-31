<?php declare(strict_types=1);

namespace OpenClassrooms\CodeGenerator\Generator\Tests\Api\ViewModels;

use OpenClassrooms\CodeGenerator\FileObjects\FileObject;
use OpenClassrooms\CodeGenerator\FileObjects\FileObjectFactory;
use OpenClassrooms\CodeGenerator\FileObjects\FileObjectType;
use OpenClassrooms\CodeGenerator\Gateway\FileObjectGateway;
use OpenClassrooms\CodeGenerator\Generator\AbstractGenerator;
use OpenClassrooms\CodeGenerator\Generator\GeneratorRequest;

/**
 * @author Romain Kuzniak <romain.kuzniak@openclassrooms.com>
 */
class ViewModelTestGenerator extends AbstractGenerator
{
    /**
     * @var FileObjectGateway
     */
    private $fileObjectGateway;

    /**
     * @var FileObjectFactory
     */
    private $fileObjectFactory;

    /**
     * @throws \Twig_Error_Loader
     * @throws \Twig_Error_Runtime
     * @throws \Twig_Error_Syntax
     */
    public function generate(GeneratorRequest $request): FileObject
    {
        // domain/class
        $fileObject = new FileObject();
        $fileObject->setClassName($request->getResponseClassName());

        $skeletonModel = $this->getSkeletonModel($fileObject);
        $fileObject->setContent($this->render('Skeleton/App/Tests/ViewModelTest.php.twig', [$skeletonModel]));

        $this->fileObjectGateway->insert($fileObject);

        return $fileObject;
    }

    private function getSkeletonModel(FileObject $fileObject)
    {
        // generate ResponseStub1
        // generate TestCase
        // get Assembler Name

        $viewModelAssembler = $this->fileObjectFactory->create(FileObjectType::API_VIEW_MODEL_ASSEMBLER, $fileObject->getClassName());

        $skeletonModel = new ViewModelTestDetail();
        $skeletonModel->assemblerClassName = $viewModelAssembler->getClassName();

        return $skeletonModel;
    }

    public function setFileObjectGateway(FileObjectGateway $fileObjectGateway)
    {
        $this->fileObjectGateway = $fileObjectGateway;
    }

    public function setFileObjectFactory(FileObjectFactory $fileObjectFactory)
    {
        $this->fileObjectFactory = $fileObjectFactory;
    }
}
