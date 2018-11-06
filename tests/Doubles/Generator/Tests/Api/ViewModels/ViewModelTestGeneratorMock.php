<?php declare(strict_types=1);

namespace OpenClassrooms\CodeGenerator\Tests\Doubles\Generator\Tests\Api\ViewModels;

use OpenClassrooms\CodeGenerator\FileObjects\FileObject;
use OpenClassrooms\CodeGenerator\FileObjects\FileObjectFactory;
use OpenClassrooms\CodeGenerator\Gateway\FileObjectGateway;
use OpenClassrooms\CodeGenerator\Generator\AbstractGenerator;
use OpenClassrooms\CodeGenerator\Generator\GeneratorRequest;

/**
 * @author Romain Kuzniak <romain.kuzniak@openclassrooms.com>
 */
class ViewModelTestGeneratorMock extends AbstractGenerator
{
    private $fileObjectGateway;

    private $fileObjectFactory;

    public function generate(GeneratorRequest $request): FileObject
    {
        $fileObject = new FileObject();
        $fileObject
            ->setClassName('')
            ->setContent(file_get_contents(__DIR__.'/../../../../../../src/Skeleton/App/Tests/ViewModelTest.php.twig'));
        return $fileObject;
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