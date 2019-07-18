<?php declare(strict_types=1);

namespace OpenClassrooms\CodeGenerator\Tests\Generator\BusinessRules\UseCases;

use OpenClassrooms\CodeGenerator\Generator\BusinessRules\UseCases\DTO\Request\UseCaseResponseDTOGeneratorRequestBuilderImpl;
use OpenClassrooms\CodeGenerator\Generator\BusinessRules\UseCases\Request\UseCaseResponseDTOGeneratorRequestBuilder;
use OpenClassrooms\CodeGenerator\Generator\BusinessRules\UseCases\UseCaseResponseDTOGenerator;
use OpenClassrooms\CodeGenerator\Tests\Doubles\Entities\BusinessRules\UseCases\UseCaseResponseDTOFileObjectStub1;
use OpenClassrooms\CodeGenerator\Tests\Doubles\Entities\EntityFileObjectFactoryMock;
use OpenClassrooms\CodeGenerator\Tests\Doubles\Entities\FileObjectTestCase;
use OpenClassrooms\CodeGenerator\Tests\Doubles\Entities\UseCaseResponseFileObjectFactoryMock;
use OpenClassrooms\CodeGenerator\Tests\Doubles\Gateways\FileObject\InMemoryFileObjectGateway;
use OpenClassrooms\CodeGenerator\Tests\Doubles\Services\Templating\TemplatingServiceMock;
use OpenClassrooms\CodeGenerator\Tests\Doubles\SkeletonModels\BusinessRules\UseCases\UseCaseResponseDTOSkeletonModelAssemblerMock;
use OpenClassrooms\CodeGenerator\Tests\Fixtures\Classes\BusinessRules\Entities\Domain\SubDomain\FunctionalEntity;
use PHPUnit\Framework\TestCase;

/**
 * @author Samuel Gomis <samuel.gomis@external.openclassrooms.com>
 */
class UseCaseResponseDTOGeneratorTest extends TestCase
{
    use FileObjectTestCase;

    /**
     * @var UseCaseResponseDTOGeneratorRequestBuilder
     */
    private $request;

    /**
     * @var UseCaseResponseDTOGenerator
     */
    private $useCaseResponseDTOGenerator;

    /**
     * @test
     */
    public function generate_ReturnFileObject(): void
    {
        $actualFileObject = $this->useCaseResponseDTOGenerator->generate($this->request);

        $this->assertSame(
            InMemoryFileObjectGateway::$fileObjects[$actualFileObject->getId()],
            $actualFileObject->getPath()
        );
        $this->assertFileObject(new UseCaseResponseDTOFileObjectStub1(), $actualFileObject);
    }

    protected function setUp(): void
    {
        $useCaseResponseDTOGeneratorRequestBuilderImpl = new UseCaseResponseDTOGeneratorRequestBuilderImpl();
        $this->request = $useCaseResponseDTOGeneratorRequestBuilderImpl
            ->create()
            ->withEntityClassName(FunctionalEntity::class)
            ->withFields(['field1', 'field2', 'id', 'field3'])
            ->build();

        $this->useCaseResponseDTOGenerator = new UseCaseResponseDTOGenerator();

        $this->useCaseResponseDTOGenerator->setUseCaseResponseDTOSkeletonModelAssembler(
            new UseCaseResponseDTOSkeletonModelAssemblerMock()
        );
        $this->useCaseResponseDTOGenerator->setEntityFileObjectFactory(new EntityFileObjectFactoryMock());
        $this->useCaseResponseDTOGenerator->setUseCaseResponseFileObjectFactory(
            new UseCaseResponseFileObjectFactoryMock()
        );
        $this->useCaseResponseDTOGenerator->setTemplating(new TemplatingServiceMock());
        $this->useCaseResponseDTOGenerator->setFileObjectGateway(new InMemoryFileObjectGateway());
    }
}
