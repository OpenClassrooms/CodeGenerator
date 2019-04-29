<?php declare(strict_types=1);

namespace OpenClassrooms\CodeGenerator\Tests\Generator\BusinessRules\UseCases;

use OpenClassrooms\CodeGenerator\Generator\BusinessRules\UseCases\DTO\Request\GenericUseCaseResponseDTOGeneratorRequestBuilderImpl;
use OpenClassrooms\CodeGenerator\Generator\BusinessRules\UseCases\GenericUseCaseResponseDTOGenerator;
use OpenClassrooms\CodeGenerator\Generator\BusinessRules\UseCases\Request\GenericUseCaseResponseDTOGeneratorRequestBuilder;
use OpenClassrooms\CodeGenerator\Tests\Doubles\Entities\BusinessRules\UseCases\GenericUseCaseResponseDTOFileObjectStub1;
use OpenClassrooms\CodeGenerator\Tests\Doubles\Entities\EntityFileObjectFactoryMock;
use OpenClassrooms\CodeGenerator\Tests\Doubles\Entities\FileObjectTestCase;
use OpenClassrooms\CodeGenerator\Tests\Doubles\Entities\UseCaseResponseFileObjectFactoryMock;
use OpenClassrooms\CodeGenerator\Tests\Doubles\Gateways\FileObject\InMemoryFileObjectGateway;
use OpenClassrooms\CodeGenerator\Tests\Doubles\Services\FieldObjectServiceMock;
use OpenClassrooms\CodeGenerator\Tests\Doubles\Services\Templating\TemplatingServiceMock;
use OpenClassrooms\CodeGenerator\Tests\Doubles\SkeletonModels\BusinessRules\UseCases\GenericUseCaseResponseDTOSkeletonModelAssemblerMock;
use OpenClassrooms\CodeGenerator\Tests\Fixtures\Classes\BusinessRules\Entities\Domain\SubDomain\FunctionalEntity;
use PHPUnit\Framework\TestCase;

/**
 * @author Samuel Gomis <samuel.gomis@external.openclassrooms.com>
 */
class GenericUseCaseResponseDTOGeneratorTest extends TestCase
{
    use FileObjectTestCase;

    /**
     * @var GenericUseCaseResponseDTOGenerator
     */
    private $genericUseCaseResponseDTOGenerator;

    /**
     * @var GenericUseCaseResponseDTOGeneratorRequestBuilder
     */
    private $request;

    /**
     * @test
     */
    public function generate_ReturnFileObject()
    {
        $actualFileObject = $this->genericUseCaseResponseDTOGenerator->generate($this->request);

        $this->assertSame(
            InMemoryFileObjectGateway::$fileObjects[$actualFileObject->getId()],
            $actualFileObject->getPath()
        );
        $this->assertFileObject(new GenericUseCaseResponseDTOFileObjectStub1(), $actualFileObject);
    }

    protected function setUp()
    {
        $genericUseCaseResponseDTOGeneratorRequestBuilderImpl = new GenericUseCaseResponseDTOGeneratorRequestBuilderImpl(
        );
        $this->request = $genericUseCaseResponseDTOGeneratorRequestBuilderImpl
            ->create()
            ->withEntity(FunctionalEntity::class)
            ->withFields(['field1', 'field2', 'id', 'field3'])
            ->build();

        $this->genericUseCaseResponseDTOGenerator = new GenericUseCaseResponseDTOGenerator();

        $this->genericUseCaseResponseDTOGenerator->setGenericUseCaseResponseDTOSkeletonModelAssembler(
            new GenericUseCaseResponseDTOSkeletonModelAssemblerMock()
        );
        $this->genericUseCaseResponseDTOGenerator->setEntityFileObjectFactory(new EntityFileObjectFactoryMock());
        $this->genericUseCaseResponseDTOGenerator->setUseCaseResponseFileObjectFactory(
            new UseCaseResponseFileObjectFactoryMock()
        );
        $this->genericUseCaseResponseDTOGenerator->setTemplating(new TemplatingServiceMock());
        $this->genericUseCaseResponseDTOGenerator->setFieldObjectService(new FieldObjectServiceMock());
        $this->genericUseCaseResponseDTOGenerator->setFileObjectGateway(new InMemoryFileObjectGateway());
    }
}
