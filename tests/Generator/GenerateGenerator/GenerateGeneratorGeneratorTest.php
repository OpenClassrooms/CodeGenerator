<?php declare(strict_types=1);

namespace OpenClassrooms\CodeGenerator\Tests\Generator\GenerateGenerator;

use OpenClassrooms\CodeGenerator\Generator\GenerateGenerator\DTO\Request\GenerateGeneratorGeneratorRequestBuilderImpl;
use OpenClassrooms\CodeGenerator\Generator\GenerateGenerator\GenerateGeneratorGenerator;
use OpenClassrooms\CodeGenerator\Generator\GenerateGenerator\Request\GenerateGeneratorGeneratorRequestBuilder;
use OpenClassrooms\CodeGenerator\Tests\Doubles\Entities\FileObjectTestCase;
use OpenClassrooms\CodeGenerator\Tests\Doubles\Entities\GenerateGenerator\GenerateGeneratorFileObjectsStub1;
use OpenClassrooms\CodeGenerator\Tests\Doubles\Entities\GenerateGeneratorObjectFactoryMock;
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
     * @test
     */
    public function generate_ReturnFileObject()
    {
        $actualFileObjects = $this->selfGeneratorGenerator->generate($this->request);
        $expectedFileObjects = new GenerateGeneratorFileObjectsStub1();

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
    }

    protected function setUp()
    {
        $selfGeneratorGeneratorRequestBuilderImpl = new GenerateGeneratorGeneratorRequestBuilderImpl();
        $this->request = $selfGeneratorGeneratorRequestBuilderImpl
            ->create()
            ->withDomain('GenerateGenerator')
            ->withEntity('Custom')
            ->build();

        $this->selfGeneratorGenerator = new GenerateGeneratorGenerator();

        $this->selfGeneratorGenerator->setAssembler(
            new GenerateGeneratorGeneratorSkeletonModelAssemblerMock()
        );
        $this->selfGeneratorGenerator->setFactory(
            new GenerateGeneratorObjectFactoryMock()
        );
        $this->selfGeneratorGenerator->setFileObjectGateway(new InMemoryFileObjectGateway());
        $this->selfGeneratorGenerator->setTemplating(new TemplatingServiceMock());
    }
}
