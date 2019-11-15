<?php declare(strict_types=1);

namespace OpenClassrooms\CodeGenerator\Tests\Generator\BusinessRules\UseCases;

use OpenClassrooms\CodeGenerator\Generator\BusinessRules\UseCases\CreateEntityUseCaseRequestDTOGenerator;
use OpenClassrooms\CodeGenerator\Generator\BusinessRules\UseCases\DTO\Request\CreateEntityUseCaseRequestDTOGeneratorRequestBuilderImpl;
use OpenClassrooms\CodeGenerator\Generator\BusinessRules\UseCases\Request\CreateEntityUseCaseRequestDTOGeneratorRequestBuilder;
use OpenClassrooms\CodeGenerator\Tests\Doubles\Entities\BusinessRules\UseCases\CreateEntityUseCaseRequestDTOFileObjectStub1;
use OpenClassrooms\CodeGenerator\Tests\Doubles\Entities\FileObjectTestCase;
use OpenClassrooms\CodeGenerator\Tests\Doubles\Entities\UseCaseRequestFileObjectFactoryMock;
use OpenClassrooms\CodeGenerator\Tests\Doubles\Gateways\FileObject\InMemoryFileObjectGateway;
use OpenClassrooms\CodeGenerator\Tests\Doubles\Services\Templating\TemplatingServiceMock;
use OpenClassrooms\CodeGenerator\Tests\Doubles\SkeletonModels\BusinessRules\UseCases\CreateEntityUseCaseRequestDTOSkeletonModelAssemblerMock;
use OpenClassrooms\CodeGenerator\Tests\Fixtures\Classes\BusinessRules\Entities\Domain\SubDomain\FunctionalEntity;
use OpenClassrooms\CodeGenerator\Utility\Impl\FieldObjectUtilityContext;
use OpenClassrooms\CodeGenerator\Utility\Impl\FieldObjectUtilityGetFieldsUpdatable;
use OpenClassrooms\CodeGenerator\Utility\Impl\MethodUtilityContext;
use OpenClassrooms\CodeGenerator\Utility\Impl\MethodUtilityGetAccessorsWithoutId;
use PHPUnit\Framework\TestCase;

class CreateEntityUseCaseRequestDTOGeneratorTest extends TestCase
{
    use FileObjectTestCase;

    /**
     * @var CreateEntityUseCaseRequestDTOGenerator
     */
    private $createEntityRequestDTOGenerator;

    /**
     * @var CreateEntityUseCaseRequestDTOGeneratorRequestBuilder
     */
    private $request;

    /**
     * @test
     */
    final public function generate_ReturnFileObject(): void
    {
        $actualFileObject = $this->createEntityRequestDTOGenerator->generate($this->request);

        $this->assertSame(
            InMemoryFileObjectGateway::$fileObjects[$actualFileObject->getId()]->getPath(),
            $actualFileObject->getPath()
        );
        $this->assertFileObject(new CreateEntityUseCaseRequestDTOFileObjectStub1(), $actualFileObject);
    }

    protected function setUp(): void
    {
        $createEntityRequestDTOGeneratorRequestBuilderImpl = new CreateEntityUseCaseRequestDTOGeneratorRequestBuilderImpl();
        $this->request = $createEntityRequestDTOGeneratorRequestBuilderImpl
            ->create()
            ->withEntityClassName(FunctionalEntity::class)
            ->build();

        $this->createEntityRequestDTOGenerator = new CreateEntityUseCaseRequestDTOGenerator();

        $this->createEntityRequestDTOGenerator->setCreateEntityUseCaseRequestDTOSkeletonModelAssembler(
            new CreateEntityUseCaseRequestDTOSkeletonModelAssemblerMock()
        );
        $this->createEntityRequestDTOGenerator->setFieldUtility(
            new FieldObjectUtilityContext(new FieldObjectUtilityGetFieldsUpdatable())
        );
        $this->createEntityRequestDTOGenerator->setMethodUtility(
            new MethodUtilityContext(new MethodUtilityGetAccessorsWithoutId())
        );
        $this->createEntityRequestDTOGenerator->setTemplating(new TemplatingServiceMock());
        $this->createEntityRequestDTOGenerator->setTemplating(new TemplatingServiceMock());
        $this->createEntityRequestDTOGenerator->setFileObjectGateway(new InMemoryFileObjectGateway());
        $this->createEntityRequestDTOGenerator->setUseCaseRequestFileObjectFactory(
            new UseCaseRequestFileObjectFactoryMock()
        );
    }
}
