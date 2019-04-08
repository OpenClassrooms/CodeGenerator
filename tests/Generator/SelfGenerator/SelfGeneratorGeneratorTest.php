<?php declare(strict_types=1);

namespace OpenClassrooms\CodeGenerator\Tests\Generator\SelfGenerator;

use OpenClassrooms\CodeGenerator\Entities\FileObject;
use OpenClassrooms\CodeGenerator\Generator\SelfGenerator\DTO\Request\SelfGeneratorGeneratorRequestBuilderImpl;
use OpenClassrooms\CodeGenerator\Generator\SelfGenerator\Request\SelfGeneratorGeneratorRequestBuilder;
use OpenClassrooms\CodeGenerator\Generator\SelfGenerator\SelfGeneratorGenerator;
use OpenClassrooms\CodeGenerator\SkeletonModels\SelfGenerator\Impl\SelfGeneratorGeneratorSkeletonModelAssemblerImpl;
use OpenClassrooms\CodeGenerator\Tests\Doubles\Entities\FileObjectTestCase;
use OpenClassrooms\CodeGenerator\Tests\Doubles\Entities\SelfGenerator\SelfGeneratorFileObjectsStub1;
use OpenClassrooms\CodeGenerator\Tests\Doubles\Entities\SelfGeneratorObjectFactoryMock;
use OpenClassrooms\CodeGenerator\Tests\Doubles\Gateways\FileObject\InMemoryFileObjectGateway;
use OpenClassrooms\CodeGenerator\Tests\Doubles\Services\Templating\TemplatingServiceMock;
use PHPUnit\Framework\TestCase;

/**
 * @author Samuel Gomis <samuel.gomis@external.openclassrooms.com>
 */
class SelfGeneratorGeneratorTest extends TestCase
{
    use FileObjectTestCase;

    /**
     * @var SelfGeneratorGeneratorRequestBuilder
     */
    private $request;

    /**
     * @var SelfGeneratorGenerator
     */
    private $selfGeneratorGenerator;

    /**
     * @test
     */
    public function generate_ReturnFileObject()
    {
        $actualFileObjects = $this->selfGeneratorGenerator->generate($this->request);
        $expectedFileObjects = new SelfGeneratorFileObjectsStub1();

        $this->assertCount(count($expectedFileObjects::$fileObjects), $actualFileObjects);
        foreach ($expectedFileObjects::$fileObjects as $key => $fileObject) {
            $this->assertArrayContains($fileObject->getClassName(), $actualFileObjects);
            $actualFileObjects = $this->removeArrayValue($actualFileObjects, $key);
        }
        $this->assertEmpty($actualFileObjects);
    }

    private function assertArrayContains(string $className, array $actualFileObjects)
    {
        foreach ($actualFileObjects as $key => $actualFileObject) {
            if ($actualFileObject->getClassName() === $className) {
                $this->assertEquals($className, $actualFileObject->getClassName());
            }
        }
    }

    /**
     * @param FileObject[]
     */
    private function removeArrayValue($actualFileObjects, int $key): array
    {
        unset($actualFileObjects[$key]);

        return $actualFileObjects;
    }

    protected function setUp()
    {
        $selfGeneratorGeneratorRequestBuilderImpl = new SelfGeneratorGeneratorRequestBuilderImpl();
        $this->request = $selfGeneratorGeneratorRequestBuilderImpl
            ->create()
            ->withDomain('SelfGenerator')
            ->withEntity('Custom')
            ->build();

        $this->selfGeneratorGenerator = new SelfGeneratorGenerator();

        $this->selfGeneratorGenerator->setAssembler(
            new SelfGeneratorGeneratorSkeletonModelAssemblerImpl()
        );
        $this->selfGeneratorGenerator->setFactory(
            new SelfGeneratorObjectFactoryMock()
        );
        $this->selfGeneratorGenerator->setFileObjectGateway(new InMemoryFileObjectGateway());
        $this->selfGeneratorGenerator->setTemplating(new TemplatingServiceMock());
    }
}
