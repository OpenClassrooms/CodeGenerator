<?php declare(strict_types=1);

namespace OpenClassrooms\CodeGenerator\Tests\Generator\BusinessRules\UseCases;

use OpenClassrooms\CodeGenerator\Generator\BusinessRules\UseCases\DTO\Request\GenericUseCaseListItemResponseDTOGeneratorRequestBuilderImpl;
use OpenClassrooms\CodeGenerator\Generator\BusinessRules\UseCases\GenericUseCaseListItemResponseDTOGenerator;
use OpenClassrooms\CodeGenerator\Generator\BusinessRules\UseCases\Request\GenericUseCaseListItemResponseDTOGeneratorRequestBuilder;
use OpenClassrooms\CodeGenerator\SkeletonModels\BusinessRules\UseCases\Impl\GenericUseCaseListItemResponseDTOSkeletonModelAssemblerImpl;
use OpenClassrooms\CodeGenerator\Tests\Doubles\Entities\BusinessRules\UseCases\GenericUseCaseListItemResponseDTOFileObjectStub1;
use OpenClassrooms\CodeGenerator\Tests\Doubles\Entities\FileObjectTestCase;
use OpenClassrooms\CodeGenerator\Tests\Doubles\Entities\UseCaseResponseFileObjectFactoryMock;
use OpenClassrooms\CodeGenerator\Tests\Doubles\Gateways\FileObject\InMemoryFileObjectGateway;
use OpenClassrooms\CodeGenerator\Tests\Doubles\Services\FieldObjectServiceMock;
use OpenClassrooms\CodeGenerator\Tests\Doubles\Services\Templating\TemplatingServiceMock;
use OpenClassrooms\CodeGenerator\Tests\Fixtures\Classes\BusinessRules\Entities\Domain\SubDomain\FunctionalEntity;
use PHPUnit\Framework\TestCase;

/**
 * @author Samuel Gomis <samuel.gomis@external.openclassrooms.com>
 */
class GenericUseCaseListItemResponseDTOGeneratorTest extends TestCase
{
    use FileObjectTestCase;

    /**
     * @var GenericUseCaseListItemResponseDTOGenerator
     */
    private $genericUseCaseListItemResponseDTOGenerator;

    /**
     * @var GenericUseCaseListItemResponseDTOGeneratorRequestBuilder
     */
    private $request;

    /**
     * @test
     */
    public function generate_ReturnFileObject()
    {
        $actualFileObject = $this->genericUseCaseListItemResponseDTOGenerator->generate($this->request);

        $this->assertSame(
            InMemoryFileObjectGateway::$fileObjects[$actualFileObject->getId()],
            $actualFileObject->getPath()
        );
        $this->assertFileObject(new GenericUseCaseListItemResponseDTOFileObjectStub1(), $actualFileObject);
    }

    protected function setUp()
    {
        $genericUseCaseListItemResponseDTOGeneratorRequestBuilderImpl = new GenericUseCaseListItemResponseDTOGeneratorRequestBuilderImpl(
        );
        $this->request = $genericUseCaseListItemResponseDTOGeneratorRequestBuilderImpl
            ->create()
            ->withEntity(FunctionalEntity::class)
            ->withFields([])
            ->build();

        $this->genericUseCaseListItemResponseDTOGenerator = new GenericUseCaseListItemResponseDTOGenerator();

        $this->genericUseCaseListItemResponseDTOGenerator->setGenericUseCaseListItemResponseDTOSkeletonModelAssembler(
            new GenericUseCaseListItemResponseDTOSkeletonModelAssemblerImpl()
        );
        $this->genericUseCaseListItemResponseDTOGenerator->setUseCaseResponseFileObjectFactory(
            new UseCaseResponseFileObjectFactoryMock()
        );
        $this->genericUseCaseListItemResponseDTOGenerator->setTemplating(new TemplatingServiceMock());
        $this->genericUseCaseListItemResponseDTOGenerator->setFieldObjectService(new FieldObjectServiceMock());
        $this->genericUseCaseListItemResponseDTOGenerator->setFileObjectGateway(new InMemoryFileObjectGateway());
    }
}
