<?php declare(strict_types=1);

namespace OpenClassrooms\CodeGenerator\Tests\Doubles\Generator\Tests\Api\ViewModels;

use OpenClassrooms\CodeGenerator\FileObjects\AbstractFileObjectFactory;
use OpenClassrooms\CodeGenerator\FileObjects\FileObject;
use OpenClassrooms\CodeGenerator\Gateways\FileObject\FileObjectGateway;
use OpenClassrooms\CodeGenerator\Generator\GeneratorRequest;
use OpenClassrooms\CodeGenerator\Generator\OldAbstractGenerator;

/**
 * @author Romain Kuzniak <romain.kuzniak@openclassrooms.com>
 */
class ViewModelTestGeneratorMockOld extends OldAbstractGenerator
{
    private $fileObjectFactory;

    private $fileObjectGateway;

    public function generate(GeneratorRequest $generatorRequest): FileObject
    {
        $fileObject = new FileObject();
        $fileObject
            ->setClassName('')
            ->setContent(file_get_contents(__DIR__ . '/../../../../../../src/Skeleton/App/Tests/ViewModelTest.php.twig'));
        return $fileObject;
    }

    public function setFileObjectFactory(AbstractFileObjectFactory $fileObjectFactory)
    {
        $this->fileObjectFactory = $fileObjectFactory;
    }

    public function setFileObjectGateway(FileObjectGateway $fileObjectGateway)
    {
        $this->fileObjectGateway = $fileObjectGateway;
    }
}
