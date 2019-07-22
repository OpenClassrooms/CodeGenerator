<?php declare(strict_types=1);

namespace OpenClassrooms\CodeGenerator\Tests\Generator\BusinessRules\Responders;

use OpenClassrooms\CodeGenerator\Generator\BusinessRules\Responders\DTO\Request\UseCaseResponseGeneratorRequestBuilderImpl;
use OpenClassrooms\CodeGenerator\Generator\BusinessRules\Responders\Request\UseCaseResponseGeneratorRequestBuilder;
use OpenClassrooms\CodeGenerator\Generator\BusinessRules\Responders\UseCaseResponseGenerator;
use OpenClassrooms\CodeGenerator\Tests\Doubles\Entities\BusinessRules\Responders\UseCaseResponseFileObjectStub1;
use OpenClassrooms\CodeGenerator\Tests\Doubles\Entities\EntityFileObjectFactoryMock;
use OpenClassrooms\CodeGenerator\Tests\Doubles\Entities\FileObjectTestCase;
use OpenClassrooms\CodeGenerator\Tests\Doubles\Entities\UseCaseResponseFileObjectFactoryMock;
use OpenClassrooms\CodeGenerator\Tests\Doubles\Gateways\FileObject\InMemoryFileObjectGateway;
use OpenClassrooms\CodeGenerator\Tests\Doubles\Services\Templating\TemplatingServiceMock;
use OpenClassrooms\CodeGenerator\Tests\Doubles\SkeletonModels\BusinessRules\Responders\UseCaseResponseSkeletonModelAssemblerMock;
use OpenClassrooms\CodeGenerator\Tests\Fixtures\Classes\BusinessRules\Entities\Domain\SubDomain\FunctionalEntity;
use PHPUnit\Framework\TestCase;

/**
 * @author Samuel Gomis <samuel.gomis@external.openclassrooms.com>
 */
class UseCaseResponseGeneratorTest extends TestCase
{
    use FileObjectTestCase;

    /**
     * @var UseCaseResponseGeneratorRequestBuilder
     */
    private $request;

    /**
     * @var UseCaseResponseGenerator
     */
    private $useCaseResponseGenerator;

    /**
     * @test
     */
    public function generate_ReturnFileObject(): void
    {
        $actualFileObject = $this->useCaseResponseGenerator->generate($this->request);

        $this->assertSame(
            InMemoryFileObjectGateway::$fileObjects[$actualFileObject->getId()]->getPath(),
            $actualFileObject->getPath()
        );
        $this->assertFileObject(new UseCaseResponseFileObjectStub1(), $actualFileObject);
    }

    protected function setUp(): void
    {
        $useCaseResponseGeneratorRequestBuilderImpl = new UseCaseResponseGeneratorRequestBuilderImpl();
        $this->request = $useCaseResponseGeneratorRequestBuilderImpl
            ->create()
            ->withEntityClassName(FunctionalEntity::class)
            ->withFields(['field1', 'field2', 'id', 'field3'])
            ->build();

        $this->useCaseResponseGenerator = new UseCaseResponseGenerator();

        $this->useCaseResponseGenerator->setUseCaseResponseSkeletonModelAssembler(
            new UseCaseResponseSkeletonModelAssemblerMock()
        );
        $this->useCaseResponseGenerator->setEntityFileObjectFactory(new EntityFileObjectFactoryMock());
        $this->useCaseResponseGenerator->setUseCaseResponseFileObjectFactory(
            new UseCaseResponseFileObjectFactoryMock()
        );
        $this->useCaseResponseGenerator->setTemplating(new TemplatingServiceMock());
        $this->useCaseResponseGenerator->setFileObjectGateway(new InMemoryFileObjectGateway());
    }
}
