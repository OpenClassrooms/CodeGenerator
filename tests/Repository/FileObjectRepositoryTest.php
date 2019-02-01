<?php declare(strict_types=1);

namespace OpenClassrooms\CodeGenerator\Tests\Repository;

use OpenClassrooms\CodeGenerator\FileObjects\FileObject;
use OpenClassrooms\CodeGenerator\Repository\FileObjectRepository;
use OpenClassrooms\CodeGenerator\Tests\Fixtures\Classes\Api\ViewModels\Domain\SubDomain\FunctionalEntity;
use OpenClassrooms\CodeGenerator\Tests\Fixtures\Classes\Api\ViewModels\Domain\SubDomain\FunctionalEntityDetail;
use OpenClassrooms\CodeGenerator\Tests\TestClassUtil;
use PHPUnit\Framework\TestCase;
use Symfony\Component\Filesystem\Filesystem;

/**
 * @author Samuel Gomis <gomis.samuel@external.openclassrooms.com>
 */
class FileObjectRepositoryTest extends TestCase
{
    /**
     * @var FileObjectRepository
     */
    private $fileObjectRepository;

    /**
     * @var Filesystem|\PHPUnit_Framework_MockObject_MockObject
     */
    private $fileSystem;

    /**
     * @test
     */
    public function insert_PushFileObject()
    {
        $fileObject = $this->generateFileObject(FunctionalEntity::class);

        $this->fileSystem
            ->expects($this->once())
            ->method('exists')
            ->with($this->equalTo($fileObject->getPath()))
            ->willReturn(true);
        $this->fileObjectRepository->insert($fileObject);

        $actual = TestClassUtil::getProperty('fileObjects', $this->fileObjectRepository);

        $this->assertNotEmpty($actual);
        $this->assertArrayHasKey($fileObject->getClassName(), $actual);
    }

    private function generateFileObject(string $className)
    {
        $fileObject = new FileObject();
        $fileObject->setClassName($className);
        $fileObject->setContent(__DIR__ . '/../Fixtures/Classes/Api/ViewModels/Domain/SubDomain/FunctionalEntity.php');

        return $fileObject;
    }

    /**
     * @test
     */
    public function flush(): void
    {
        $fileObjects = [
            $this->generateFileObject(FunctionalEntity::class),
            $this->generateFileObject(FunctionalEntityDetail::class),
        ];

        $actual = TestClassUtil::setProperty('fileObjects', $fileObjects, $this->fileObjectRepository);

        $this->assertNotEmpty($actual);

        $this->fileSystem
            ->expects($this->at(0))
            ->method('dumpFile')
            ->with($this->equalTo($fileObjects[0]->getPath()))
            ->willReturn(true);

        $this->fileSystem
            ->expects($this->at(1))
            ->method('dumpFile')
            ->with($this->equalTo($fileObjects[1]->getPath()))
            ->willReturn(true);

        $this->fileObjectRepository->flush();

        $actual = TestClassUtil::getProperty('fileObjects', $this->fileObjectRepository);

        $this->assertEmpty($actual);
    }

    protected function setUp()
    {
        $this->fileObjectRepository = new FileObjectRepository();
        $this->fileSystem = $this->createMock(Filesystem::class);
        $this->fileObjectRepository->setFileSystem($this->fileSystem);
    }
}
