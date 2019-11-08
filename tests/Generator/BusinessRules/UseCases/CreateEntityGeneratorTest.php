<?php declare(strict_types=1);

namespace OpenClassrooms\CodeGenerator\Tests\Generator\BusinessRules\UseCases;

use OpenClassrooms\CodeGenerator\Generator\BusinessRules\UseCases\CreateEntityGenerator;
use OpenClassrooms\CodeGenerator\Generator\BusinessRules\UseCases\DTO\Request\CreateEntityGeneratorRequestBuilderImpl;
use OpenClassrooms\CodeGenerator\Generator\BusinessRules\UseCases\Request\CreateEntityGeneratorRequestBuilder;
use OpenClassrooms\CodeGenerator\Tests\Doubles\Entities\BusinessRules\UseCases\CreateEntityFileObjectStub1;
use OpenClassrooms\CodeGenerator\Tests\Doubles\Entities\EntityFileObjectFactoryMock;
use OpenClassrooms\CodeGenerator\Tests\Doubles\Entities\FileObjectTestCase;
use OpenClassrooms\CodeGenerator\Tests\Doubles\Entities\UseCaseFileObjectFactoryMock;
use OpenClassrooms\CodeGenerator\Tests\Doubles\Entities\UseCaseRequestFileObjectFactoryMock;
use OpenClassrooms\CodeGenerator\Tests\Doubles\Entities\UseCaseResponseFileObjectFactoryMock;
use OpenClassrooms\CodeGenerator\Tests\Doubles\Gateways\FileObject\InMemoryFileObjectGateway;
use OpenClassrooms\CodeGenerator\Tests\Doubles\Services\Templating\TemplatingServiceMock;
use OpenClassrooms\CodeGenerator\Tests\Doubles\SkeletonModels\BusinessRules\UseCases\CreateEntitySkeletonModelBuilderMock;
use OpenClassrooms\CodeGenerator\Tests\Fixtures\Classes\BusinessRules\Entities\Domain\SubDomain\FunctionalEntity;
use OpenClassrooms\CodeGenerator\Utility\Impl\MethodUtilityContext;
use OpenClassrooms\CodeGenerator\Utility\Impl\MethodUtilityGetAccessorsWithoutId;
use PHPUnit\Framework\TestCase;

class CreateEntityGeneratorTest extends TestCase
{
    use FileObjectTestCase;

    /**
     * @var CreateEntityGenerator
     */
    private $createEntityGenerator;

    /**
     * @var CreateEntityGeneratorRequestBuilder
     */
    private $request;

    /**
     * @test
     */
    final public function generate_ReturnFileObject(): void
    {
        $actualFileObject = $this->createEntityGenerator->generate($this->request);

        $this->assertSame(
            InMemoryFileObjectGateway::$fileObjects[$actualFileObject->getId()]->getPath(),
            $actualFileObject->getPath()
        );
        $this->assertFileObject(new CreateEntityFileObjectStub1(), $actualFileObject);
    }

    protected function setUp(): void
    {
        $createEntityGeneratorRequestBuilderImpl = new CreateEntityGeneratorRequestBuilderImpl();
        $this->request = $createEntityGeneratorRequestBuilderImpl
            ->create()
            ->withEntityClassName(FunctionalEntity::class)
            ->build();

        $this->createEntityGenerator = new CreateEntityGenerator();

        $this->createEntityGenerator->setCreateEntitySkeletonModelBuilder(
            new CreateEntitySkeletonModelBuilderMock()
        );
        $this->createEntityGenerator->setEntityFileObjectFactory(new EntityFileObjectFactoryMock());
        $this->createEntityGenerator->setFileObjectGateway(new InMemoryFileObjectGateway());
        $this->createEntityGenerator->setMethodUtility(new MethodUtilityContext(new MethodUtilityGetAccessorsWithoutId()));
        $this->createEntityGenerator->setTemplating(new TemplatingServiceMock());
        $this->createEntityGenerator->setUseCaseFileObjectFactory(new UseCaseFileObjectFactoryMock());
        $this->createEntityGenerator->setUseCaseRequestFileObjectFactory(new UseCaseRequestFileObjectFactoryMock());
        $this->createEntityGenerator->setUseCaseResponseFileObjectFactory(new UseCaseResponseFileObjectFactoryMock());
    }
}
