<?php declare(strict_types=1);

namespace OpenClassrooms\CodeGenerator\Tests\Generator\BusinessRules\UseCases;

use OpenClassrooms\CodeGenerator\Generator\BusinessRules\UseCases\DTO\Request\EntityUseCaseCommonRequestGeneratorRequestBuilderImpl;
use OpenClassrooms\CodeGenerator\Generator\BusinessRules\UseCases\EntityUseCaseCommonRequestGenerator;
use OpenClassrooms\CodeGenerator\Generator\BusinessRules\UseCases\Request\EntityUseCaseCommonRequestGeneratorRequestBuilder;
use OpenClassrooms\CodeGenerator\Tests\Doubles\Entities\BusinessRules\UseCases\EntityUseCaseCommonRequestFileObjectStub1;
use OpenClassrooms\CodeGenerator\Tests\Doubles\Entities\FileObjectTestCase;
use OpenClassrooms\CodeGenerator\Tests\Doubles\Entities\UseCaseRequestFileObjectFactoryMock;
use OpenClassrooms\CodeGenerator\Tests\Doubles\Gateways\FileObject\InMemoryFileObjectGateway;
use OpenClassrooms\CodeGenerator\Tests\Doubles\Services\Templating\TemplatingServiceMock;
use OpenClassrooms\CodeGenerator\Tests\Doubles\SkeletonModels\BusinessRules\UseCases\EntityUseCaseCommonRequestSkeletonModelAssemblerMock;
use OpenClassrooms\CodeGenerator\Tests\Fixtures\Classes\BusinessRules\Entities\Domain\SubDomain\FunctionalEntity;
use OpenClassrooms\CodeGenerator\Utility\Impl\FieldObjectUtilityContext;
use OpenClassrooms\CodeGenerator\Utility\Impl\FieldObjectUtilityGetFieldsUpdatable;
use OpenClassrooms\CodeGenerator\Utility\Impl\MethodUtilityContext;
use OpenClassrooms\CodeGenerator\Utility\Impl\MethodUtilityGetAccessorsWithoutId;
use PHPUnit\Framework\TestCase;

class EntityUseCaseCommonRequestGeneratorTest extends TestCase
{
    use FileObjectTestCase;

    /**
     * @var EntityUseCaseCommonRequestGenerator
     */
    private $entityUseCaseCommonRequestGenerator;

    /**
     * @var EntityUseCaseCommonRequestGeneratorRequestBuilder
     */
    private $request;

    /**
     * @test
     */
    final public function generate_ReturnFileObject(): void
    {
        $actualFileObject = $this->entityUseCaseCommonRequestGenerator->generate($this->request);

        $this->assertSame(
            InMemoryFileObjectGateway::$fileObjects[$actualFileObject->getId()]->getPath(),
            $actualFileObject->getPath()
        );
        $this->assertFileObject(new EntityUseCaseCommonRequestFileObjectStub1(), $actualFileObject);
    }

    protected function setUp(): void
    {
        $entityUseCaseCommonRequestGeneratorRequestBuilderImpl = new EntityUseCaseCommonRequestGeneratorRequestBuilderImpl(
        );
        $this->request = $entityUseCaseCommonRequestGeneratorRequestBuilderImpl
            ->create()
            ->withEntityClassName(FunctionalEntity::class)
            ->build();

        $this->entityUseCaseCommonRequestGenerator = new EntityUseCaseCommonRequestGenerator();

        $this->entityUseCaseCommonRequestGenerator->setEntityUseCaseCommonRequestSkeletonModelAssembler(
            new EntityUseCaseCommonRequestSkeletonModelAssemblerMock()
        );
        $this->entityUseCaseCommonRequestGenerator->setFieldUtility(
            new FieldObjectUtilityContext(new FieldObjectUtilityGetFieldsUpdatable())
        );
        $this->entityUseCaseCommonRequestGenerator->setFileObjectGateway(new InMemoryFileObjectGateway());
        $this->entityUseCaseCommonRequestGenerator->setMethodUtility(
            new MethodUtilityContext(new MethodUtilityGetAccessorsWithoutId())
        );
        $this->entityUseCaseCommonRequestGenerator->setTemplating(new TemplatingServiceMock());
        $this->entityUseCaseCommonRequestGenerator->setUseCaseRequestFileObjectFactory(
            new UseCaseRequestFileObjectFactoryMock()
        );
    }
}
