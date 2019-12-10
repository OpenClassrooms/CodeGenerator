<?php declare(strict_types=1);

namespace OpenClassrooms\CodeGenerator\Tests\Generator\Tests\BusinessRules\UseCases;

use OpenClassrooms\CodeGenerator\Generator\Tests\BusinessRules\UseCases\DTO\Request\GenericUseCaseTestGeneratorRequestBuilderImpl;
use OpenClassrooms\CodeGenerator\Generator\Tests\BusinessRules\UseCases\GenericUseCaseTestGenerator;
use OpenClassrooms\CodeGenerator\Generator\Tests\BusinessRules\UseCases\Request\GenericUseCaseTestGeneratorRequestBuilder;
use OpenClassrooms\CodeGenerator\SkeletonModels\Tests\BusinessRules\UseCases\Impl\GenericUseCaseTestSkeletonModelAssemblerImpl;
use OpenClassrooms\CodeGenerator\Tests\Doubles\Entities\FileObjectTestCase;
use OpenClassrooms\CodeGenerator\Tests\Doubles\Entities\Tests\BusinessRules\UseCases\GenericUseCaseTestFileObjectStub1;
use OpenClassrooms\CodeGenerator\Tests\Doubles\Entities\UseCaseFileObjectFactoryMock;
use OpenClassrooms\CodeGenerator\Tests\Doubles\Entities\UseCaseRequestFileObjectFactoryMock;
use OpenClassrooms\CodeGenerator\Tests\Doubles\Gateways\FileObject\InMemoryFileObjectGateway;
use OpenClassrooms\CodeGenerator\Tests\Doubles\Services\Templating\TemplatingServiceMock;
use PHPUnit\Framework\TestCase;

class GenericUseCaseTestGeneratorTest extends TestCase
{
    use FileObjectTestCase;

    /**
     * @var GenericUseCaseTestGenerator
     */
    private $genericUseCaseTestGenerator;

    /**
     * @var GenericUseCaseTestGeneratorRequestBuilder
     */
    private $request;

    /**
     * @test
     */
    public function generate_ReturnFileObject(): void
    {
        $actualFileObject = $this->genericUseCaseTestGenerator->generate($this->request);

        $this->assertSame(
            InMemoryFileObjectGateway::$fileObjects[$actualFileObject->getId()]->getPath(),
            $actualFileObject->getPath()
        );
        $this->assertFileObject(new GenericUseCaseTestFileObjectStub1(), $actualFileObject);
    }

    protected function setUp(): void
    {
        $genericUseCaseTestGeneratorRequestBuilderImpl = new GenericUseCaseTestGeneratorRequestBuilderImpl();
        $this->request = $genericUseCaseTestGeneratorRequestBuilderImpl
            ->create()
            ->withDomain('Domain\SubDomain')
            ->withUseCaseName('GenericUseCase')
            ->build();

        $this->genericUseCaseTestGenerator = new GenericUseCaseTestGenerator();

        $this->genericUseCaseTestGenerator->setUseCaseFileObjectFactory(
            new UseCaseFileObjectFactoryMock()
        );
        $this->genericUseCaseTestGenerator->setUseCaseRequestFileObjectFactory(
            new UseCaseRequestFileObjectFactoryMock()
        );

        $genericUseCaseTestSkeletonModelAssemblerImpl = new GenericUseCaseTestSkeletonModelAssemblerImpl();
        $this->genericUseCaseTestGenerator->setGenericUseCaseTestSkeletonModelAssembler(
            $genericUseCaseTestSkeletonModelAssemblerImpl
        );

        $this->genericUseCaseTestGenerator->setTemplating(new TemplatingServiceMock());
        $this->genericUseCaseTestGenerator->setFileObjectGateway(new InMemoryFileObjectGateway());
    }
}
