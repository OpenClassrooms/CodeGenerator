<?php declare(strict_types=1);

namespace OpenClassrooms\CodeGenerator\Tests\Generator\BusinessRules\UseCases;

use OpenClassrooms\CodeGenerator\Generator\BusinessRules\UseCases\DTO\Request\GetEntitiesUseCaseGeneratorRequestBuilderImpl;
use OpenClassrooms\CodeGenerator\Generator\BusinessRules\UseCases\GetEntitiesUseCaseGenerator;
use OpenClassrooms\CodeGenerator\Generator\BusinessRules\UseCases\Request\GetEntitiesUseCaseGeneratorRequestBuilder;
use OpenClassrooms\CodeGenerator\Tests\Doubles\Entities\BusinessRules\UseCases\GetEntitiesUseCaseFileObjectStub1;
use OpenClassrooms\CodeGenerator\Tests\Doubles\Entities\EntityFileObjectFactoryMock;
use OpenClassrooms\CodeGenerator\Tests\Doubles\Entities\FileObjectTestCase;
use OpenClassrooms\CodeGenerator\Tests\Doubles\Entities\UseCaseFileObjectFactoryMock;
use OpenClassrooms\CodeGenerator\Tests\Doubles\Entities\UseCaseRequestFileObjectFactoryMock;
use OpenClassrooms\CodeGenerator\Tests\Doubles\Entities\UseCaseResponseFileObjectFactoryMock;
use OpenClassrooms\CodeGenerator\Tests\Doubles\Gateways\FileObject\InMemoryFileObjectGateway;
use OpenClassrooms\CodeGenerator\Tests\Doubles\Services\Templating\TemplatingServiceMock;
use OpenClassrooms\CodeGenerator\Tests\Doubles\SkeletonModels\BusinessRules\UseCases\GetEntitiesUseCaseSkeletonModelAssemblerMock;
use OpenClassrooms\CodeGenerator\Tests\Fixtures\Classes\BusinessRules\Entities\Domain\SubDomain\FunctionalEntity;
use PHPUnit\Framework\TestCase;

class GetEntitiesUseCaseGeneratorTest extends TestCase
{
    use FileObjectTestCase;

    /**
     * @var GetEntitiesUseCaseGenerator
     */
    private $getEntitiesUseCaseGenerator;

    /**
     * @var GetEntitiesUseCaseGeneratorRequestBuilder
     */
    private $request;

    /**
     * @test
     */
    public function generate_ReturnFileObject(): void
    {
        $actualFileObject = $this->getEntitiesUseCaseGenerator->generate($this->request);

        $this->assertSame(
            InMemoryFileObjectGateway::$fileObjects[$actualFileObject->getId()]->getPath(),
            $actualFileObject->getPath()
        );
        $this->assertFileObject(new GetEntitiesUseCaseFileObjectStub1(), $actualFileObject);
    }

    protected function setUp(): void
    {
        $getEntitiesUseCaseGeneratorRequestBuilderImpl = new GetEntitiesUseCaseGeneratorRequestBuilderImpl();
        $this->request = $getEntitiesUseCaseGeneratorRequestBuilderImpl
            ->create()
            ->withEntityClassName(FunctionalEntity::class)
            ->build();

        $this->getEntitiesUseCaseGenerator = new GetEntitiesUseCaseGenerator();

        $this->getEntitiesUseCaseGenerator->setGetEntitiesUseCaseSkeletonModelAssembler(
            new GetEntitiesUseCaseSkeletonModelAssemblerMock()
        );
        $this->getEntitiesUseCaseGenerator->setEntityFileObjectFactory(new EntityFileObjectFactoryMock());
        $this->getEntitiesUseCaseGenerator->setUseCaseFileObjectFactory(new UseCaseFileObjectFactoryMock());
        $this->getEntitiesUseCaseGenerator->setUseCaseRequestFileObjectFactory(
            new UseCaseRequestFileObjectFactoryMock()
        );
        $this->getEntitiesUseCaseGenerator->setUseCaseResponseFileObjectFactory(
            new UseCaseResponseFileObjectFactoryMock()
        );
        $this->getEntitiesUseCaseGenerator->setTemplating(new TemplatingServiceMock());
        $this->getEntitiesUseCaseGenerator->setFileObjectGateway(new InMemoryFileObjectGateway());
    }
}
