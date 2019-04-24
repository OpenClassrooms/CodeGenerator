<?php declare(strict_types=1);

namespace OpenClassrooms\CodeGenerator\Tests\Generator\BusinessRules\UseCases;

use OpenClassrooms\CodeGenerator\Generator\BusinessRules\UseCases\DTO\Request\GenericUseCaseDetailResponseDTOGeneratorRequestBuilderImpl;
use OpenClassrooms\CodeGenerator\Generator\BusinessRules\UseCases\GenericUseCaseDetailResponseDTOGenerator;
use OpenClassrooms\CodeGenerator\Generator\BusinessRules\UseCases\Request\GenericUseCaseDetailResponseDTOGeneratorRequestBuilder;
use OpenClassrooms\CodeGenerator\SkeletonModels\BusinessRules\UseCases\Impl\GenericUseCaseDetailResponseDTOSkeletonModelAssemblerImpl;
use OpenClassrooms\CodeGenerator\Tests\Doubles\Entities\BusinessRules\UseCases\GenericUseCaseDetailResponseDTOFileObjectStub1;
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
class GenericUseCaseDetailResponseDTOGeneratorTest extends TestCase
{
    use FileObjectTestCase;

    /**
     * @var GenericUseCaseDetailResponseDTOGenerator
     */
    private $genericUseCaseDetailResponseDTOGenerator;

    /**
     * @var GenericUseCaseDetailResponseDTOGeneratorRequestBuilder
     */
    private $request;

    /**
     * @test
     */
    public function generate_ReturnFileObject()
    {
        $actualFileObject = $this->genericUseCaseDetailResponseDTOGenerator->generate($this->request);

        $this->assertSame(
            InMemoryFileObjectGateway::$fileObjects[$actualFileObject->getId()],
            $actualFileObject->getPath()
        );
        $this->assertFileObject(new GenericUseCaseDetailResponseDTOFileObjectStub1(), $actualFileObject);
    }

    protected function setUp()
    {
        $genericUseCaseDetailResponseDTOGeneratorRequestBuilderImpl = new GenericUseCaseDetailResponseDTOGeneratorRequestBuilderImpl(
        );
        $this->request = $genericUseCaseDetailResponseDTOGeneratorRequestBuilderImpl
            ->create()
            ->withEntity(FunctionalEntity::class)
            ->withFields(['field4'])
            ->build();

        $this->genericUseCaseDetailResponseDTOGenerator = new GenericUseCaseDetailResponseDTOGenerator();

        $this->genericUseCaseDetailResponseDTOGenerator->setGenericUseCaseDetailResponseDTOSkeletonModelAssembler(
            new GenericUseCaseDetailResponseDTOSkeletonModelAssemblerImpl()
        );
        $this->genericUseCaseDetailResponseDTOGenerator->setUseCaseResponseFileObjectFactory(
            new UseCaseResponseFileObjectFactoryMock()
        );
        $this->genericUseCaseDetailResponseDTOGenerator->setTemplating(new TemplatingServiceMock());
        $this->genericUseCaseDetailResponseDTOGenerator->setFieldObjectService(new FieldObjectServiceMock());
        $this->genericUseCaseDetailResponseDTOGenerator->setFileObjectGateway(new InMemoryFileObjectGateway());
    }
}
