<?php declare(strict_types=1);

namespace OpenClassrooms\CodeGenerator\Tests\Generator\BusinessRules\UseCases;

use OpenClassrooms\CodeGenerator\Generator\BusinessRules\UseCases\CreateEntityRequestBuilderImplGenerator;
use OpenClassrooms\CodeGenerator\Generator\BusinessRules\UseCases\DTO\Request\CreateEntityRequestBuilderImplGeneratorRequestBuilderImpl;
use OpenClassrooms\CodeGenerator\Generator\BusinessRules\UseCases\Request\CreateEntityRequestBuilderImplGeneratorRequestBuilder;
use OpenClassrooms\CodeGenerator\Tests\Doubles\Entities\BusinessRules\UseCases\CreateEntityRequestBuilderImplFileObjectStub1;
use OpenClassrooms\CodeGenerator\Tests\Doubles\Entities\FileObjectTestCase;
use OpenClassrooms\CodeGenerator\Tests\Doubles\Entities\UseCaseRequestFileObjectFactoryMock;
use OpenClassrooms\CodeGenerator\Tests\Doubles\Gateways\FileObject\InMemoryFileObjectGateway;
use OpenClassrooms\CodeGenerator\Tests\Doubles\Services\Templating\TemplatingServiceMock;
use OpenClassrooms\CodeGenerator\Tests\Doubles\SkeletonModels\BusinessRules\UseCases\CreateEntityRequestBuilderImplSkeletonModelAssemblerMock;
use OpenClassrooms\CodeGenerator\Tests\Fixtures\Classes\BusinessRules\Entities\Domain\SubDomain\FunctionalEntity;
use PHPUnit\Framework\TestCase;

class CreateEntityRequestBuilderImplGeneratorTest extends TestCase
{
    use FileObjectTestCase;

    /**
     * @var CreateEntityRequestBuilderImplGenerator
     */
    private $createEntityRequestBuilderImplGenerator;

    /**
     * @var CreateEntityRequestBuilderImplGeneratorRequestBuilder
     */
    private $request;

    /**
     * @test
     */
    final public function generate_ReturnFileObject(): void
    {
        $actualFileObject = $this->createEntityRequestBuilderImplGenerator->generate($this->request);

        $this->assertSame(
            InMemoryFileObjectGateway::$fileObjects[$actualFileObject->getId()]->getPath(),
            $actualFileObject->getPath()
        );
        $this->assertFileObject(new CreateEntityRequestBuilderImplFileObjectStub1(), $actualFileObject);
    }

    protected function setUp(): void
    {
        $createEntityRequestBuilderImplGeneratorRequestBuilderImpl = new CreateEntityRequestBuilderImplGeneratorRequestBuilderImpl(
        );
        $this->request = $createEntityRequestBuilderImplGeneratorRequestBuilderImpl
            ->create()
            ->withEntityClassName(FunctionalEntity::class)
            ->build();

        $this->createEntityRequestBuilderImplGenerator = new CreateEntityRequestBuilderImplGenerator();

        $this->createEntityRequestBuilderImplGenerator->setCreateEntityRequestBuilderImplSkeletonModelAssembler(
            new CreateEntityRequestBuilderImplSkeletonModelAssemblerMock()
        );
        $this->createEntityRequestBuilderImplGenerator->setTemplating(new TemplatingServiceMock());
        $this->createEntityRequestBuilderImplGenerator->setFileObjectGateway(new InMemoryFileObjectGateway());
        $this->createEntityRequestBuilderImplGenerator->setUseCaseRequestFileObjectFactory(
            new UseCaseRequestFileObjectFactoryMock()
        );
    }
}
