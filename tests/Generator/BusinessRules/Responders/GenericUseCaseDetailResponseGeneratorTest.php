<?php declare(strict_types=1);

namespace OpenClassrooms\CodeGenerator\Tests\Generator\BusinessRules\Responders;

use OpenClassrooms\CodeGenerator\Generator\BusinessRules\Responders\DTO\Request\GenericUseCaseDetailResponseGeneratorRequestBuilderImpl;
use OpenClassrooms\CodeGenerator\Generator\BusinessRules\Responders\GenericUseCaseDetailResponseGenerator;
use OpenClassrooms\CodeGenerator\Generator\BusinessRules\Responders\Request\GenericUseCaseDetailResponseGeneratorRequestBuilder;
use OpenClassrooms\CodeGenerator\SkeletonModels\BusinessRules\Responders\Impl\GenericUseCaseDetailResponseSkeletonModelAssemblerImpl;
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
class GenericUseCaseDetailResponseGeneratorTest extends TestCase
{
    use FileObjectTestCase;

    /**
     * @var GenericUseCaseDetailResponseGenerator
     */
    private $genericUseCaseDetailResponseGenerator;

    /**
     * @var GenericUseCaseDetailResponseGeneratorRequestBuilder
     */
    private $request;

    /**
     * @test
     */
    public function generate_ReturnFileObject()
    {
        $actualFileObject = $this->genericUseCaseDetailResponseGenerator->generate($this->request);

        $this->assertSame(
            InMemoryFileObjectGateway::$fileObjects[$actualFileObject->getId()],
            $actualFileObject->getPath()
        );
//        $this->assertFileObject(new GenericUseCaseDetailResponseFileObjectStub1(), $actualFileObject);
    }

    protected function setUp()
    {
        $genericUseCaseDetailResponseGeneratorRequestBuilderImpl = new GenericUseCaseDetailResponseGeneratorRequestBuilderImpl(
        );
        $this->request = $genericUseCaseDetailResponseGeneratorRequestBuilderImpl
            ->create()
            ->withEntity(FunctionalEntity::class)
            ->build();

        $this->genericUseCaseDetailResponseGenerator = new GenericUseCaseDetailResponseGenerator();

        $this->genericUseCaseDetailResponseGenerator->setEntityFileObjectFactory(new EntityFileObjectFactoryMock());
        $this->genericUseCaseDetailResponseGenerator->setGenericUseCaseDetailResponseSkeletonModelAssembler(
            new GenericUseCaseDetailResponseSkeletonModelAssemblerImpl()
        );
        $this->genericUseCaseDetailResponseGenerator->setUseCaseResponseFileObjectFactory(
            new UseCaseResponseFileObjectFactoryMock()
        );
        $this->genericUseCaseDetailResponseGenerator->setTemplating(new TemplatingServiceMock());
        $this->genericUseCaseDetailResponseGenerator->setFileObjectGateway(new InMemoryFileObjectGateway());
    }
}
