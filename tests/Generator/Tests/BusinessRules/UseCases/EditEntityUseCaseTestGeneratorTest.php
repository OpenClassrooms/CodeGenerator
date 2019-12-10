<?php declare(strict_types=1);

namespace OpenClassrooms\CodeGenerator\Tests\Generator\Tests\BusinessRules\UseCases;

use OpenClassrooms\CodeGenerator\Generator\Tests\BusinessRules\UseCases\DTO\Request\EditEntityUseCaseTestGeneratorRequestBuilderImpl;
use OpenClassrooms\CodeGenerator\Generator\Tests\BusinessRules\UseCases\EditEntityUseCaseTestGenerator;
use OpenClassrooms\CodeGenerator\Generator\Tests\BusinessRules\UseCases\Request\EditEntityUseCaseTestGeneratorRequestBuilder;
use OpenClassrooms\CodeGenerator\Tests\Doubles\Entities\EntityFileObjectFactoryMock;
use OpenClassrooms\CodeGenerator\Tests\Doubles\Entities\FileObjectTestCase;
use OpenClassrooms\CodeGenerator\Tests\Doubles\Entities\Tests\BusinessRules\UseCases\EditEntityUseCaseTestFileObjectStub1;
use OpenClassrooms\CodeGenerator\Tests\Doubles\Entities\UseCaseFileObjectFactoryMock;
use OpenClassrooms\CodeGenerator\Tests\Doubles\Entities\UseCaseRequestFileObjectFactoryMock;
use OpenClassrooms\CodeGenerator\Tests\Doubles\Entities\UseCaseResponseFileObjectFactoryMock;
use OpenClassrooms\CodeGenerator\Tests\Doubles\Gateways\FileObject\InMemoryFileObjectGateway;
use OpenClassrooms\CodeGenerator\Tests\Doubles\Services\Templating\TemplatingServiceMock;
use OpenClassrooms\CodeGenerator\Tests\Doubles\SkeletonModels\Tests\BusinessRules\UseCases\EditEntityUseCaseTestSkeletonModelBuilderMock;
use OpenClassrooms\CodeGenerator\Tests\Fixtures\Classes\BusinessRules\Entities\Domain\SubDomain\FunctionalEntity;
use PHPUnit\Framework\TestCase;

class EditEntityUseCaseTestGeneratorTest extends TestCase
{
    use FileObjectTestCase;

    /**
     * @var EditEntityUseCaseTestGenerator
     */
    private $editEntityUseCaseTestGenerator;

    /**
     * @var EditEntityUseCaseTestGeneratorRequestBuilder
     */
    private $request;

    /**
     * @test
     */
    final public function generate_ReturnFileObject(): void
    {
        $actualFileObject = $this->editEntityUseCaseTestGenerator->generate($this->request);

        $this->assertSame(
            InMemoryFileObjectGateway::$fileObjects[$actualFileObject->getId()]->getPath(),
            $actualFileObject->getPath()
        );
        $this->assertFileObject(new EditEntityUseCaseTestFileObjectStub1(), $actualFileObject);
    }

    protected function setUp(): void
    {
        $editEntityUseCaseTestGeneratorRequestBuilderImpl = new EditEntityUseCaseTestGeneratorRequestBuilderImpl();
        $this->request = $editEntityUseCaseTestGeneratorRequestBuilderImpl
            ->create()
            ->withEntityClassName(FunctionalEntity::class)
            ->build();

        $this->editEntityUseCaseTestGenerator = new EditEntityUseCaseTestGenerator();

        $this->editEntityUseCaseTestGenerator->setEditEntityUseCaseTestSkeletonModelBuilder(
            new EditEntityUseCaseTestSkeletonModelBuilderMock()
        );
        $this->editEntityUseCaseTestGenerator->setEntityFileObjectFactory(new EntityFileObjectFactoryMock());
        $this->editEntityUseCaseTestGenerator->setFileObjectGateway(new InMemoryFileObjectGateway());
        $this->editEntityUseCaseTestGenerator->setTemplating(new TemplatingServiceMock());
        $this->editEntityUseCaseTestGenerator->setUseCaseFileObjectFactory(new UseCaseFileObjectFactoryMock());
        $this->editEntityUseCaseTestGenerator->setUseCaseRequestFileObjectFactory(
            new UseCaseRequestFileObjectFactoryMock()
        );
        $this->editEntityUseCaseTestGenerator->setUseCaseResponseFileObjectFactory(
            new UseCaseResponseFileObjectFactoryMock()
        );
    }
}
