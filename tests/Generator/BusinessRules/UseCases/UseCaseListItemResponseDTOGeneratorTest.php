<?php declare(strict_types=1);

namespace OpenClassrooms\CodeGenerator\Tests\Generator\BusinessRules\UseCases;

use OpenClassrooms\CodeGenerator\Generator\BusinessRules\UseCases\DTO\Request\UseCaseListItemResponseDTOGeneratorRequestBuilderImpl;
use OpenClassrooms\CodeGenerator\Generator\BusinessRules\UseCases\Request\UseCaseListItemResponseDTOGeneratorRequestBuilder;
use OpenClassrooms\CodeGenerator\Generator\BusinessRules\UseCases\UseCaseListItemResponseDTOGenerator;
use OpenClassrooms\CodeGenerator\SkeletonModels\BusinessRules\UseCases\Impl\UseCaseListItemResponseDTOSkeletonModelAssemblerImpl;
use OpenClassrooms\CodeGenerator\Tests\Doubles\Entities\BusinessRules\UseCases\UseCaseListItemResponseDTOFileObjectStub1;
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
class UseCaseListItemResponseDTOGeneratorTest extends TestCase
{
    use FileObjectTestCase;

    /**
     * @var UseCaseListItemResponseDTOGenerator
     */
    private $useCaseListItemResponseDTOGenerator;

    /**
     * @var UseCaseListItemResponseDTOGeneratorRequestBuilder
     */
    private $request;

    /**
     * @test
     */
    public function generate_ReturnFileObject()
    {
        $actualFileObject = $this->useCaseListItemResponseDTOGenerator->generate($this->request);

        $this->assertSame(
            InMemoryFileObjectGateway::$fileObjects[$actualFileObject->getId()],
            $actualFileObject->getPath()
        );
        $this->assertFileObject(new UseCaseListItemResponseDTOFileObjectStub1(), $actualFileObject);
    }

    protected function setUp()
    {
        $useCaseListItemResponseDTOGeneratorRequestBuilderImpl = new UseCaseListItemResponseDTOGeneratorRequestBuilderImpl(
        );
        $this->request = $useCaseListItemResponseDTOGeneratorRequestBuilderImpl
            ->create()
            ->withEntity(FunctionalEntity::class)
            ->withFields([])
            ->build();

        $this->useCaseListItemResponseDTOGenerator = new UseCaseListItemResponseDTOGenerator();

        $this->useCaseListItemResponseDTOGenerator->setUseCaseListItemResponseDTOSkeletonModelAssembler(
            new UseCaseListItemResponseDTOSkeletonModelAssemblerImpl()
        );
        $this->useCaseListItemResponseDTOGenerator->setUseCaseResponseFileObjectFactory(
            new UseCaseResponseFileObjectFactoryMock()
        );
        $this->useCaseListItemResponseDTOGenerator->setTemplating(new TemplatingServiceMock());
        $this->useCaseListItemResponseDTOGenerator->setFieldObjectService(new FieldObjectServiceMock());
        $this->useCaseListItemResponseDTOGenerator->setFileObjectGateway(new InMemoryFileObjectGateway());
    }
}
