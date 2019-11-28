<?php declare(strict_types=1);

namespace OpenClassrooms\CodeGenerator\Tests\Generator\GenerateGenerator;

use OpenClassrooms\CodeGenerator\Commands\ConstructionPatternType;
use OpenClassrooms\CodeGenerator\Entities\Object\FileObject;
use OpenClassrooms\CodeGenerator\Generator\GenerateGenerator\DTO\Request\GenerateGeneratorGeneratorRequestBuilderImpl;
use OpenClassrooms\CodeGenerator\Generator\GenerateGenerator\GenerateGeneratorGenerator;
use OpenClassrooms\CodeGenerator\Generator\GenerateGenerator\Request\GenerateGeneratorGeneratorRequestBuilder;
use OpenClassrooms\CodeGenerator\Tests\Doubles\Entities\FileObjectTestCase;
use OpenClassrooms\CodeGenerator\Tests\Doubles\Entities\GenerateGenerator\GenerateGeneratorFileObjectsStub1;
use OpenClassrooms\CodeGenerator\Tests\Doubles\Entities\GenerateGenerator\GenerateGeneratorFileObjectsStub2;
use OpenClassrooms\CodeGenerator\Tests\Doubles\Entities\GenerateGeneratorFileObjectFactoryMock;
use OpenClassrooms\CodeGenerator\Tests\Doubles\Gateways\FileObject\InMemoryFileObjectGateway;
use OpenClassrooms\CodeGenerator\Tests\Doubles\Services\Templating\TemplatingServiceMock;
use OpenClassrooms\CodeGenerator\Tests\Doubles\SkeletonModels\GenerateGenerator\GenerateGeneratorGeneratorSkeletonModelAssemblerMock;
use PHPUnit\Framework\TestCase;

/**
 * @author Samuel Gomis <samuel.gomis@external.openclassrooms.com>
 */
class GenerateGeneratorGeneratorTest extends TestCase
{
    use FileObjectTestCase;

    /**
     * @var GenerateGeneratorGeneratorRequestBuilder
     */
    private $request;

    /**
     * @var GenerateGeneratorGenerator
     */
    private $selfGeneratorGenerator;

    /**
     * @param FileObject[]
     */
    protected function assertGeneratorFiles(
        $expectedFileObjects,
        array $actualFileObjects
    ): void {
        $this->assertCount(count($expectedFileObjects::$fileObjects), $actualFileObjects);
        foreach ($expectedFileObjects::$fileObjects as $key => $fileObject) {
            [$actual, $valueKey] = $this->extractFileObject($fileObject->getClassName(), $actualFileObjects);
            $this->assertEquals($fileObject->getClassName(), $actual->getClassName());
            $this->assertStringEqualsFile($fileObject->getContent(), $actual->getContent());
            unset($actualFileObjects[$valueKey]);
        }
        $this->assertEmpty($actualFileObjects);
    }

    private function extractFileObject(string $className, array $actualFileObjects): array
    {
        foreach ($actualFileObjects as $key => $actualFileObject) {
            if ($className === $actualFileObject->getClassName()) {
                return [$actualFileObject, $key];
            }
        }
        $actualFileObject;
    }

    /**
     * @test
     */
    public function generateWithAssemblerConstructionType_ReturnFileObjects(): void
    {
        $actualFileObjects = $this->selfGeneratorGenerator->generate($this->request);

        $this->assertGeneratorFiles(new GenerateGeneratorFileObjectsStub1(), $actualFileObjects);
    }

    /**
     * @test
     */
    public function generateWithBuilderConstructionType_ReturnFileObjects(): void
    {
        $selfGeneratorGeneratorRequestBuilderImpl = new GenerateGeneratorGeneratorRequestBuilderImpl();
        $this->request = $selfGeneratorGeneratorRequestBuilderImpl
            ->create()
            ->withDomain('GenerateGenerator')
            ->withEntityClassName('Custom')
            ->withConstructionPattern(ConstructionPatternType::BUILDER_PATTERN)
            ->build();
        $actualFileObjects = $this->selfGeneratorGenerator->generate($this->request);

        $this->assertGeneratorFiles(new GenerateGeneratorFileObjectsStub2(), $actualFileObjects);
    }

    protected function setUp(): void
    {
        $selfGeneratorGeneratorRequestBuilderImpl = new GenerateGeneratorGeneratorRequestBuilderImpl();
        $this->request = $selfGeneratorGeneratorRequestBuilderImpl
            ->create()
            ->withDomain('GenerateGenerator')
            ->withEntityClassName('Custom')
            ->withConstructionPattern(ConstructionPatternType::ASSEMBLER_PATTERN)
            ->build();

        $this->selfGeneratorGenerator = new GenerateGeneratorGenerator();

        $this->selfGeneratorGenerator->setAssembler(
            new GenerateGeneratorGeneratorSkeletonModelAssemblerMock()
        );
        $this->selfGeneratorGenerator->setFactory(
            new GenerateGeneratorFileObjectFactoryMock()
        );
        $this->selfGeneratorGenerator->setFileObjectGateway(new InMemoryFileObjectGateway());
        $this->selfGeneratorGenerator->setTemplating(new TemplatingServiceMock());
    }
}
