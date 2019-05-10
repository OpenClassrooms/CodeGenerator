<?php declare(strict_types=1);

namespace OpenClassrooms\CodeGenerator\Tests\Generator\BusinessRules\Responders;

use OpenClassrooms\CodeGenerator\Generator\BusinessRules\Responders\DTO\Request\UseCaseDetailResponseGeneratorRequestBuilderImpl;
use OpenClassrooms\CodeGenerator\Generator\BusinessRules\Responders\UseCaseDetailResponseGenerator;
use OpenClassrooms\CodeGenerator\Generator\BusinessRules\Responders\Request\UseCaseDetailResponseGeneratorRequestBuilder;
use OpenClassrooms\CodeGenerator\SkeletonModels\BusinessRules\Responders\Impl\UseCaseDetailResponseSkeletonModelAssemblerImpl;
use OpenClassrooms\CodeGenerator\Tests\Doubles\Entities\BusinessRules\Responders\UseCaseDetailResponseFileObjectStub1;
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
class UseCaseDetailResponseGeneratorTest extends TestCase
{
    use FileObjectTestCase;

    /**
     * @var UseCaseDetailResponseGenerator
     */
    private $useCaseDetailResponseGenerator;

    /**
     * @var UseCaseDetailResponseGeneratorRequestBuilder
     */
    private $request;

    /**
     * @test
     */
    public function generate_ReturnFileObject()
    {
        $actualFileObject = $this->useCaseDetailResponseGenerator->generate($this->request);

        $this->assertSame(
            InMemoryFileObjectGateway::$fileObjects[$actualFileObject->getId()],
            $actualFileObject->getPath()
        );
        $this->assertFileObject(new UseCaseDetailResponseFileObjectStub1(), $actualFileObject);
    }

    protected function setUp()
    {
        $useCaseDetailResponseGeneratorRequestBuilderImpl = new UseCaseDetailResponseGeneratorRequestBuilderImpl(
        );
        $this->request = $useCaseDetailResponseGeneratorRequestBuilderImpl
            ->create()
            ->withEntity(FunctionalEntity::class)
            ->withFields(['field4'])
            ->build();

        $this->useCaseDetailResponseGenerator = new UseCaseDetailResponseGenerator();

        $this->useCaseDetailResponseGenerator->setEntityFileObjectFactory(new EntityFileObjectFactoryMock());
        $this->useCaseDetailResponseGenerator->setUseCaseDetailResponseSkeletonModelAssembler(
            new UseCaseDetailResponseSkeletonModelAssemblerImpl()
        );
        $this->useCaseDetailResponseGenerator->setUseCaseResponseFileObjectFactory(
            new UseCaseResponseFileObjectFactoryMock()
        );
        $this->useCaseDetailResponseGenerator->setTemplating(new TemplatingServiceMock());
        $this->useCaseDetailResponseGenerator->setFileObjectGateway(new InMemoryFileObjectGateway());
    }
}