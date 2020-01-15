<?php declare(strict_types=1);

namespace OpenClassrooms\CodeGenerator\Tests\Generator\Api\Controller;

use OpenClassrooms\CodeGenerator\Generator\Api\Controller\DTO\Request\PatchEntityControllerGeneratorRequestBuilderImpl;
use OpenClassrooms\CodeGenerator\Generator\Api\Controller\PatchEntityControllerGenerator;
use OpenClassrooms\CodeGenerator\Generator\Api\Controller\Request\PatchEntityControllerGeneratorRequestBuilder;
use OpenClassrooms\CodeGenerator\Tests\Doubles\Entities\Api\Controller\PatchEntityControllerFileObjectStub1;
use OpenClassrooms\CodeGenerator\Tests\Doubles\Entities\ControllerFileObjectFactoryMock;
use OpenClassrooms\CodeGenerator\Tests\Doubles\Entities\EntityFileObjectFactoryMock;
use OpenClassrooms\CodeGenerator\Tests\Doubles\Entities\FileObjectTestCase;
use OpenClassrooms\CodeGenerator\Tests\Doubles\Entities\ModelFileObjectFactoryMock;
use OpenClassrooms\CodeGenerator\Tests\Doubles\Entities\UseCaseFileObjectFactoryMock;
use OpenClassrooms\CodeGenerator\Tests\Doubles\Entities\UseCaseRequestFileObjectFactoryMock;
use OpenClassrooms\CodeGenerator\Tests\Doubles\Entities\UseCaseResponseFileObjectFactoryMock;
use OpenClassrooms\CodeGenerator\Tests\Doubles\Entities\ViewModelFileObjectFactoryMock;
use OpenClassrooms\CodeGenerator\Tests\Doubles\Gateways\FileObject\InMemoryFileObjectGateway;
use OpenClassrooms\CodeGenerator\Tests\Doubles\Services\Templating\TemplatingServiceMock;
use OpenClassrooms\CodeGenerator\Tests\Doubles\SkeletonModels\Api\Controller\PatchEntityControllerSkeletonModelBuilderMock;
use OpenClassrooms\CodeGenerator\Tests\Fixtures\Classes\BusinessRules\Entities\Domain\SubDomain\FunctionalEntity;
use PHPUnit\Framework\TestCase;

class PatchEntityControllerGeneratorTest extends TestCase
{
    use FileObjectTestCase;

    /**
     * @var PatchEntityControllerGenerator
     */
    private $patchEntityControllerGenerator;

    /**
     * @var PatchEntityControllerGeneratorRequestBuilder
     */
    private $request;

    /**
     * @test
     */
    final public function generate_ReturnFileObject(): void
    {
        $actualFileObject = $this->patchEntityControllerGenerator->generate($this->request);

        $this->assertSame(
            InMemoryFileObjectGateway::$fileObjects[$actualFileObject->getId()]->getPath(),
            $actualFileObject->getPath()
        );
        $this->assertFileObject(new PatchEntityControllerFileObjectStub1(), $actualFileObject);
    }

    protected function setUp(): void
    {
        $patchEntityControllerGeneratorRequestBuilderImpl = new PatchEntityControllerGeneratorRequestBuilderImpl();
        $this->request = $patchEntityControllerGeneratorRequestBuilderImpl
            ->create()
            ->withEntityClassName(FunctionalEntity::class)
            ->build();

        $this->patchEntityControllerGenerator = new PatchEntityControllerGenerator();

        $this->patchEntityControllerGenerator->setControllerFileObjectFactory(new ControllerFileObjectFactoryMock());
        $this->patchEntityControllerGenerator->setEntityFileObjectFactory(new EntityFileObjectFactoryMock());
        $this->patchEntityControllerGenerator->setFileObjectGateway(new InMemoryFileObjectGateway());
        $this->patchEntityControllerGenerator->setModelFileObjectFactory(new ModelFileObjectFactoryMock());
        $this->patchEntityControllerGenerator->setPatchEntityControllerSkeletonModelBuilder(
            new PatchEntityControllerSkeletonModelBuilderMock()
        );
        $this->patchEntityControllerGenerator->setTemplating(new TemplatingServiceMock());
        $this->patchEntityControllerGenerator->setUseCaseFileObjectFactory(new UseCaseFileObjectFactoryMock());
        $this->patchEntityControllerGenerator->setUseCaseRequestFileObjectFactory(
            new UseCaseRequestFileObjectFactoryMock()
        );
        $this->patchEntityControllerGenerator->setUseCaseResponseFileObjectFactory(
            new UseCaseResponseFileObjectFactoryMock()
        );
        $this->patchEntityControllerGenerator->setViewModelFileObjectFactory(new ViewModelFileObjectFactoryMock());
    }
}
