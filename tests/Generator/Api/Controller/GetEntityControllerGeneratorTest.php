<?php declare(strict_types=1);

namespace OpenClassrooms\CodeGenerator\Tests\Generator\Api\Controller;

use OpenClassrooms\CodeGenerator\Generator\Api\Controller\DTO\Request\GetEntityControllerGeneratorRequestBuilderImpl;
use OpenClassrooms\CodeGenerator\Generator\Api\Controller\GetEntityControllerGenerator;
use OpenClassrooms\CodeGenerator\Generator\Api\Controller\Request\GetEntityControllerGeneratorRequestBuilder;
use OpenClassrooms\CodeGenerator\Tests\Doubles\Entities\Api\Controller\GetEntityControllerFileObjectStub1;
use OpenClassrooms\CodeGenerator\Tests\Doubles\Entities\ControllerFileObjectFactoryMock;
use OpenClassrooms\CodeGenerator\Tests\Doubles\Entities\EntityFileObjectFactoryMock;
use OpenClassrooms\CodeGenerator\Tests\Doubles\Entities\FileObjectTestCase;
use OpenClassrooms\CodeGenerator\Tests\Doubles\Entities\UseCaseFileObjectFactoryMock;
use OpenClassrooms\CodeGenerator\Tests\Doubles\Entities\UseCaseRequestFileObjectFactoryMock;
use OpenClassrooms\CodeGenerator\Tests\Doubles\Entities\UseCaseResponseFileObjectFactoryMock;
use OpenClassrooms\CodeGenerator\Tests\Doubles\Entities\ViewModelFileObjectFactoryMock;
use OpenClassrooms\CodeGenerator\Tests\Doubles\Gateways\FileObject\InMemoryFileObjectGateway;
use OpenClassrooms\CodeGenerator\Tests\Doubles\Services\Templating\TemplatingServiceMock;
use OpenClassrooms\CodeGenerator\Tests\Doubles\SkeletonModels\Api\Controller\GetEntityControllerSkeletonModelBuilderMock;
use OpenClassrooms\CodeGenerator\Tests\Fixtures\Classes\BusinessRules\Entities\Domain\SubDomain\FunctionalEntity;
use PHPUnit\Framework\TestCase;

class GetEntityControllerGeneratorTest extends TestCase
{
    use FileObjectTestCase;

    /**
     * @var GetEntityControllerGenerator
     */
    private $getEntityControllerGenerator;

    /**
     * @var GetEntityControllerGeneratorRequestBuilder
     */
    private $request;

    /**
     * @test
     */
    final public function generate_ReturnFileObject(): void
    {
        $actualFileObject = $this->getEntityControllerGenerator->generate($this->request);

        $this->assertSame(
            InMemoryFileObjectGateway::$fileObjects[$actualFileObject->getId()]->getPath(),
            $actualFileObject->getPath()
        );
        $this->assertFileObject(new GetEntityControllerFileObjectStub1(), $actualFileObject);
    }

    protected function setUp(): void
    {
        $getEntityControllerGeneratorRequestBuilderImpl = new GetEntityControllerGeneratorRequestBuilderImpl();
        $this->request = $getEntityControllerGeneratorRequestBuilderImpl
            ->create()
            ->withEntityClassName(FunctionalEntity::class)
            ->build();

        $this->getEntityControllerGenerator = new GetEntityControllerGenerator();
        $this->getEntityControllerGenerator->setControllerFileObjectFactory(new ControllerFileObjectFactoryMock());
        $this->getEntityControllerGenerator->setEntityFileObjectFactory(new EntityFileObjectFactoryMock());
        $this->getEntityControllerGenerator->setFileObjectGateway(new InMemoryFileObjectGateway());
        $this->getEntityControllerGenerator->setGetEntityControllerSkeletonModelBuilder(
            new GetEntityControllerSkeletonModelBuilderMock()
        );
        $this->getEntityControllerGenerator->setTemplating(new TemplatingServiceMock());
        $this->getEntityControllerGenerator->setUseCaseFileObjectFactory(new UseCaseFileObjectFactoryMock());
        $this->getEntityControllerGenerator->setUseCaseRequestFileObjectFactory(
            new UseCaseRequestFileObjectFactoryMock()
        );
        $this->getEntityControllerGenerator->setUseCaseResponseFileObjectFactory(
            new UseCaseResponseFileObjectFactoryMock()
        );
        $this->getEntityControllerGenerator->setViewModelFileObjectFactory(new ViewModelFileObjectFactoryMock());
    }
}
