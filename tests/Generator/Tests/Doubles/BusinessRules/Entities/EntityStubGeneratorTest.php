<?php declare(strict_types=1);

namespace OpenClassrooms\CodeGenerator\Tests\Generator\Tests\Doubles\BusinessRules\Entities;

use OpenClassrooms\CodeGenerator\Generator\Tests\BusinessRules\Entities\DTO\Request\EntityStubGeneratorRequestBuilderImpl;
use OpenClassrooms\CodeGenerator\Generator\Tests\BusinessRules\Entities\EntityStubGenerator;
use OpenClassrooms\CodeGenerator\Generator\Tests\BusinessRules\Entities\Request\EntityStubGeneratorRequestBuilder;
use OpenClassrooms\CodeGenerator\SkeletonModels\Tests\BusinessRules\Entities\Impl\EntityStubSkeletonModelAssemblerImpl;
use OpenClassrooms\CodeGenerator\Tests\Doubles\Entities\EntityFileObjectFactoryMock;
use OpenClassrooms\CodeGenerator\Tests\Doubles\Entities\FileObjectTestCase;
use OpenClassrooms\CodeGenerator\Tests\Doubles\Entities\Tests\BusinessRules\Entities\EntityStub\EntityStubFileObjectStub1;
use OpenClassrooms\CodeGenerator\Tests\Doubles\Gateways\FileObject\InMemoryFileObjectGateway;
use OpenClassrooms\CodeGenerator\Tests\Doubles\Services\Templating\TemplatingServiceMock;
use OpenClassrooms\CodeGenerator\Tests\Fixtures\Classes\BusinessRules\Responders\Domain\SubDomain\FunctionalEntityResponse;
use PHPUnit\Framework\TestCase;

/**
 * @author Samuel Gomis <samuel.gomis@external.openclassrooms.com>
 */
class EntityStubGeneratorTest extends TestCase
{
    use FileObjectTestCase;

    /**
     * @var EntityStubGenerator
     */
    private $entityStubGenerator;

    /**
     * @var EntityStubGeneratorRequestBuilder
     */
    private $request;

    /**
     * @test
     */
    public function generate_ReturnFileObject(): void
    {
        $actualFileObject = $this->entityStubGenerator->generate($this->request);

        $this->assertSame(
            InMemoryFileObjectGateway::$fileObjects[$actualFileObject->getId()],
            $actualFileObject->getPath()
        );
        $this->assertFileObject(new EntityStubFileObjectStub1(), $actualFileObject);
    }

    protected function setUp(): void
    {
        $stub1GeneratorRequestBuilder = new EntityStubGeneratorRequestBuilderImpl();
        $this->request = $stub1GeneratorRequestBuilder
            ->create()
            ->withClassName(FunctionalEntityResponse::class)
            ->build();

        $this->entityStubGenerator = new EntityStubGenerator();

        $this->entityStubGenerator->setFileObjectGateway(new InMemoryFileObjectGateway());
        $this->entityStubGenerator->setTemplating(new TemplatingServiceMock());
        $this->entityStubGenerator->setEntityFileObjectFactory(new EntityFileObjectFactoryMock());
        $this->entityStubGenerator->setEntityStubSkeletonModelAssembler(
            new EntityStubSkeletonModelAssemblerImpl()
        );
    }
}
