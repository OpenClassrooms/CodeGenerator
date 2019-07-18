<?php declare(strict_types=1);

namespace OpenClassrooms\CodeGenerator\Tests\Generator\BusinessRules\Responders;

use OpenClassrooms\CodeGenerator\Generator\BusinessRules\Responders\DTO\Request\UseCaseDetailResponseAssemblerGeneratorRequestBuilderImpl;
use OpenClassrooms\CodeGenerator\Generator\BusinessRules\Responders\Request\UseCaseDetailResponseAssemblerGeneratorRequestBuilder;
use OpenClassrooms\CodeGenerator\Generator\BusinessRules\Responders\UseCaseDetailResponseAssemblerGenerator;
use OpenClassrooms\CodeGenerator\SkeletonModels\BusinessRules\Responders\Impl\UseCaseDetailResponseAssemblerSkeletonModelAssemblerImpl;
use OpenClassrooms\CodeGenerator\Tests\Doubles\Entities\BusinessRules\Responders\UseCaseDetailResponseAssemblerFileObjectStub1;
use OpenClassrooms\CodeGenerator\Tests\Doubles\Entities\EntityFileObjectFactoryMock;
use OpenClassrooms\CodeGenerator\Tests\Doubles\Entities\FileObjectTestCase;
use OpenClassrooms\CodeGenerator\Tests\Doubles\Entities\UseCaseResponseFileObjectFactoryMock;
use OpenClassrooms\CodeGenerator\Tests\Doubles\Gateways\FileObject\InMemoryFileObjectGateway;
use OpenClassrooms\CodeGenerator\Tests\Doubles\Services\Templating\TemplatingServiceMock;
use OpenClassrooms\CodeGenerator\Tests\Fixtures\Classes\BusinessRules\Entities\Domain\SubDomain\FunctionalEntity;
use PHPUnit\Framework\TestCase;

/**
 * @author Samuel Gomis <samuel.gomis@external.openclassrooms.com>
 */
class UseCaseDetailResponseAssemblerGeneratorTest extends TestCase
{
    use FileObjectTestCase;

    /**
     * @var UseCaseDetailResponseAssemblerGeneratorRequestBuilder
     */
    private $request;

    /**
     * @var UseCaseDetailResponseAssemblerGenerator
     */
    private $useCaseDetailResponseAssemblerGenerator;

    /**
     * @test
     */
    public function generate_ReturnFileObject(): void
    {
        $actualFileObject = $this->useCaseDetailResponseAssemblerGenerator->generate($this->request);

        $this->assertSame(
            InMemoryFileObjectGateway::$fileObjects[$actualFileObject->getId()],
            $actualFileObject->getPath()
        );
        $this->assertFileObject(new UseCaseDetailResponseAssemblerFileObjectStub1(), $actualFileObject);
    }

    protected function setUp(): void
    {
        $useCaseDetailResponseAssemblerGeneratorRequestBuilderImpl = new UseCaseDetailResponseAssemblerGeneratorRequestBuilderImpl(
        );
        $this->request = $useCaseDetailResponseAssemblerGeneratorRequestBuilderImpl
            ->create()
            ->withEntityClassName(FunctionalEntity::class)
            ->build();

        $this->useCaseDetailResponseAssemblerGenerator = new UseCaseDetailResponseAssemblerGenerator();

        $this->useCaseDetailResponseAssemblerGenerator->setUseCaseDetailResponseAssemblerSkeletonModelAssembler(
            new UseCaseDetailResponseAssemblerSkeletonModelAssemblerImpl()
        );
        $this->useCaseDetailResponseAssemblerGenerator->setEntityFileObjectFactory(
            new EntityFileObjectFactoryMock()
        );
        $this->useCaseDetailResponseAssemblerGenerator->setUseCaseResponseFileObjectFactory(
            new UseCaseResponseFileObjectFactoryMock()
        );
        $this->useCaseDetailResponseAssemblerGenerator->setTemplating(new TemplatingServiceMock());
        $this->useCaseDetailResponseAssemblerGenerator->setFileObjectGateway(new InMemoryFileObjectGateway());
    }
}
