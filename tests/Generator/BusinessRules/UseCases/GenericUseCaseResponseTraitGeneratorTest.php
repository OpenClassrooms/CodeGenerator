<?php declare(strict_types=1);

namespace OpenClassrooms\CodeGenerator\Tests\Generator\BusinessRules\UseCases;

use OpenClassrooms\CodeGenerator\Generator\BusinessRules\UseCases\DTO\Request\GenericUseCaseResponseTraitGeneratorRequestBuilderImpl;
use OpenClassrooms\CodeGenerator\Generator\BusinessRules\UseCases\GenericUseCaseResponseTraitGenerator;
use OpenClassrooms\CodeGenerator\Generator\BusinessRules\UseCases\Request\GenericUseCaseResponseTraitGeneratorRequestBuilder;
use OpenClassrooms\CodeGenerator\Tests\Doubles\Entities\BusinessRules\UseCases\GenericUseCaseResponseTraitFileObjectStub1;
use OpenClassrooms\CodeGenerator\Tests\Doubles\Entities\EntityFileObjectFactoryMock;
use OpenClassrooms\CodeGenerator\Tests\Doubles\Entities\FileObjectTestCase;
use OpenClassrooms\CodeGenerator\Tests\Doubles\Entities\UseCaseResponseFileObjectFactoryMock;
use OpenClassrooms\CodeGenerator\Tests\Doubles\Gateways\FileObject\InMemoryFileObjectGateway;
use OpenClassrooms\CodeGenerator\Tests\Doubles\Services\Templating\TemplatingServiceMock;
use OpenClassrooms\CodeGenerator\Tests\Doubles\SkeletonModels\BusinessRules\UseCases\GenericUseCaseResponseTraitSkeletonModelAssemblerMock;
use OpenClassrooms\CodeGenerator\Tests\Fixtures\Classes\BusinessRules\Entities\Domain\SubDomain\FunctionalEntity;
use PHPUnit\Framework\TestCase;

/**
 * @author Samuel Gomis <samuel.gomis@external.openclassrooms.com>
 */
class GenericUseCaseResponseTraitGeneratorTest extends TestCase
{
    use FileObjectTestCase;

    /**
     * @var GenericUseCaseResponseTraitGenerator
     */
    private $genericUseCaseResponseTraitGenerator;

    /**
     * @var GenericUseCaseResponseTraitGeneratorRequestBuilder
     */
    private $request;

    /**
     * @test
     */
    public function generate_ReturnFileObject()
    {
        $actualFileObject = $this->genericUseCaseResponseTraitGenerator->generate($this->request);

        $this->assertSame(
            InMemoryFileObjectGateway::$fileObjects[$actualFileObject->getId()],
            $actualFileObject->getPath()
        );
        $this->assertFileObject(new GenericUseCaseResponseTraitFileObjectStub1(), $actualFileObject);
    }

    protected function setUp()
    {
        $genericUseCaseResponseTraitGeneratorRequestBuilderImpl = new GenericUseCaseResponseTraitGeneratorRequestBuilderImpl(
        );
        $this->request = $genericUseCaseResponseTraitGeneratorRequestBuilderImpl
            ->create()
            ->withEntity(FunctionalEntity::class)
            ->withFields(['field1', 'field2', 'id', 'field3'])
            ->build();

        $this->genericUseCaseResponseTraitGenerator = new GenericUseCaseResponseTraitGenerator();

        $this->genericUseCaseResponseTraitGenerator->setGenericUseCaseResponseTraitSkeletonModelAssembler(
            new GenericUseCaseResponseTraitSkeletonModelAssemblerMock()
        );
        $this->genericUseCaseResponseTraitGenerator->setEntityFileObjectFactory(new EntityFileObjectFactoryMock());
        $this->genericUseCaseResponseTraitGenerator->setUseCaseResponseFileObjectFactory(
            new UseCaseResponseFileObjectFactoryMock()
        );
        $this->genericUseCaseResponseTraitGenerator->setTemplating(new TemplatingServiceMock());
        $this->genericUseCaseResponseTraitGenerator->setFileObjectGateway(new InMemoryFileObjectGateway());
    }
}
