<?php declare(strict_types=1);

namespace OpenClassrooms\CodeGenerator\Tests\Generator\BusinessRules\Responders;

use OpenClassrooms\CodeGenerator\Generator\BusinessRules\Responders\DTO\Request\GenericUseCaseResponseGeneratorRequestBuilderImpl;
use OpenClassrooms\CodeGenerator\Generator\BusinessRules\Responders\GenericUseCaseResponseGenerator;
use OpenClassrooms\CodeGenerator\Generator\BusinessRules\Responders\Request\GenericUseCaseResponseGeneratorRequestBuilder;
use OpenClassrooms\CodeGenerator\Tests\Doubles\Entities\BusinessRules\Responders\GenericUseCaseResponseFileObjectStub1;
use OpenClassrooms\CodeGenerator\Tests\Doubles\Entities\EntityFileObjectFactoryMock;
use OpenClassrooms\CodeGenerator\Tests\Doubles\Entities\FileObjectTestCase;
use OpenClassrooms\CodeGenerator\Tests\Doubles\Entities\UseCaseResponseFileObjectFactoryMock;
use OpenClassrooms\CodeGenerator\Tests\Doubles\Gateways\FileObject\InMemoryFileObjectGateway;
use OpenClassrooms\CodeGenerator\Tests\Doubles\Services\Templating\TemplatingServiceMock;
use OpenClassrooms\CodeGenerator\Tests\Doubles\SkeletonModels\BusinessRules\Responders\GenericUseCaseResponseSkeletonModelAssemblerMock;
use OpenClassrooms\CodeGenerator\Tests\Fixtures\Classes\BusinessRules\Entities\Domain\SubDomain\FunctionalEntity;
use PHPUnit\Framework\TestCase;

/**
 * @author Samuel Gomis <samuel.gomis@external.openclassrooms.com>
 */
class GenericUseCaseResponseGeneratorTest extends TestCase
{
    use FileObjectTestCase;

    /**
     * @var GenericUseCaseResponseGenerator
     */
    private $genericUseCaseResponseGenerator;

    /**
     * @var GenericUseCaseResponseGeneratorRequestBuilder
     */
    private $request;

    /**
     * @test
     */
    public function generate_ReturnFileObject()
    {
        $actualFileObject = $this->genericUseCaseResponseGenerator->generate($this->request);

        $this->assertSame(
            InMemoryFileObjectGateway::$fileObjects[$actualFileObject->getId()],
            $actualFileObject->getPath()
        );
 //       $this->assertFileObject(new GenericUseCaseResponseFileObjectStub1(), $actualFileObject);
    }

    protected function setUp()
    {
        $genericUseCaseResponseGeneratorRequestBuilderImpl = new GenericUseCaseResponseGeneratorRequestBuilderImpl();
        $this->request = $genericUseCaseResponseGeneratorRequestBuilderImpl
            ->create()
            ->withEntity(FunctionalEntity::class)
            ->build();

        $this->genericUseCaseResponseGenerator = new GenericUseCaseResponseGenerator();

        $this->genericUseCaseResponseGenerator->setGenericUseCaseResponseSkeletonModelAssembler(
            new GenericUseCaseResponseSkeletonModelAssemblerMock()
        );
        $this->genericUseCaseResponseGenerator->setEntityFileObjectFactory(new EntityFileObjectFactoryMock());
        $this->genericUseCaseResponseGenerator->setUseCaseResponseFileObjectFactory(
            new UseCaseResponseFileObjectFactoryMock()
        );
        $this->genericUseCaseResponseGenerator->setTemplating(new TemplatingServiceMock());
        $this->genericUseCaseResponseGenerator->setFileObjectGateway(new InMemoryFileObjectGateway());
    }
}
