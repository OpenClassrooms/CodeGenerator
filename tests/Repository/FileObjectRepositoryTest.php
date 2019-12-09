<?php declare(strict_types=1);

namespace OpenClassrooms\CodeGenerator\Tests\Repository;

use OpenClassrooms\CodeGenerator\Entities\Object\FileObject;
use OpenClassrooms\CodeGenerator\Repository\FileObjectRepository;
use OpenClassrooms\CodeGenerator\Tests\Fixtures\Classes\Api\ViewModels\Domain\SubDomain\FunctionalEntityViewModel;
use OpenClassrooms\CodeGenerator\Tests\Fixtures\Classes\Api\ViewModels\Domain\SubDomain\FunctionalEntityViewModelDetail;
use OpenClassrooms\CodeGenerator\Tests\TestClassUtil;
use PHPUnit\Framework\TestCase;
use Symfony\Component\Filesystem\Filesystem;

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
    public function find()
    {
        $this->fileSystem
            ->expects($this->atLeastOnce())
            ->method('exists')
            ->willReturn(false);

        $this->fileObjectRepository->insert($this->generateFileObject(FunctionalEntityViewModel::class));

        $this->assertNotNull($this->fileObjectRepository->find(FunctionalEntityViewModel::class));
    }

    private function generateFileObject(string $className): FileObject
    {
        $fileObject = new FileObject($className);
        $fileObject->setContent(
            __DIR__ . '/../Fixtures/Classes/Api/ViewModels/Domain/SubDomain/FunctionalEntityViewModel.php'
        );

        return $fileObject;
    }

    /**
     * @test
     */
    public function findAll()
    {
        $this->fileSystem
            ->expects($this->atLeastOnce())
            ->method('exists')
            ->willReturn(false);

        $this->fileObjectRepository->insert($this->generateFileObject(FunctionalEntityViewModel::class));
        $this->fileObjectRepository->insert($this->generateFileObject(FunctionalEntityViewModelDetail::class));

        $this->assertNotNull($this->fileObjectRepository->findAll());
    }

    /**
     * @test
     */
    public function flush(): void
    {
        $fileObjects = [
            $this->generateFileObject(FunctionalEntityViewModel::class),
            $this->generateFileObject(FunctionalEntityViewModelDetail::class),
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

    /**
     * @test
     */
    public function insert_PushFileObject(): void
    {
        $fileObject = $this->generateFileObject(FunctionalEntityViewModel::class);

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

    protected function setUp(): void
    {
        $this->fileObjectRepository = new FileObjectRepository();
        $this->fileSystem = $this->createMock(Filesystem::class);
        $this->fileObjectRepository->setFileSystem($this->fileSystem);
    }
}
