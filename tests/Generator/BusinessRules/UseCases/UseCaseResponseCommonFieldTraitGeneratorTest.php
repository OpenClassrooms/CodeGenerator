<?php declare(strict_types=1);

namespace OpenClassrooms\CodeGenerator\Tests\Generator\BusinessRules\UseCases;

use OpenClassrooms\CodeGenerator\Generator\BusinessRules\UseCases\DTO\Request\UseCaseResponseCommonFieldTraitGeneratorRequestBuilderImpl;
use OpenClassrooms\CodeGenerator\Generator\BusinessRules\UseCases\Request\UseCaseResponseCommonFieldTraitGeneratorRequestBuilder;
use OpenClassrooms\CodeGenerator\Generator\BusinessRules\UseCases\UseCaseResponseCommonFieldTraitGenerator;
use OpenClassrooms\CodeGenerator\Tests\Doubles\Entities\BusinessRules\UseCases\UseCaseResponseCommonFieldTraitFileObjectStub1;
use OpenClassrooms\CodeGenerator\Tests\Doubles\Entities\EntityFileObjectFactoryMock;
use OpenClassrooms\CodeGenerator\Tests\Doubles\Entities\FileObjectTestCase;
use OpenClassrooms\CodeGenerator\Tests\Doubles\Entities\UseCaseResponseFileObjectFactoryMock;
use OpenClassrooms\CodeGenerator\Tests\Doubles\Gateways\FileObject\InMemoryFileObjectGateway;
use OpenClassrooms\CodeGenerator\Tests\Doubles\Services\Templating\TemplatingServiceMock;
use OpenClassrooms\CodeGenerator\Tests\Doubles\SkeletonModels\BusinessRules\UseCases\UseCaseResponseCommonFieldTraitSkeletonModelAssemblerMock;
use OpenClassrooms\CodeGenerator\Tests\Fixtures\Classes\BusinessRules\Entities\Domain\SubDomain\FunctionalEntity;
use PHPUnit\Framework\TestCase;

/**
 * @author Samuel Gomis <samuel.gomis@external.openclassrooms.com>
 */
class UseCaseResponseCommonFieldTraitGeneratorTest extends TestCase
{
    use FileObjectTestCase;

    /**
     * @var UseCaseResponseCommonFieldTraitGeneratorRequestBuilder
     */
    private $request;

    /**
     * @var UseCaseResponseCommonFieldTraitGenerator
     */
    private $useCaseResponseCommonFieldTraitGenerator;

    /**
     * @test
     */
    public function generate_ReturnFileObject(): void
    {
        $actualFileObject = $this->useCaseResponseCommonFieldTraitGenerator->generate($this->request);

        $this->assertSame(
            InMemoryFileObjectGateway::$fileObjects[$actualFileObject->getId()]->getPath(),
            $actualFileObject->getPath()
        );
        $this->assertFileObject(new UseCaseResponseCommonFieldTraitFileObjectStub1(), $actualFileObject);
    }

    protected function setUp(): void
    {
        $useCaseResponseCommonFieldTraitGeneratorRequestBuilderImpl = new UseCaseResponseCommonFieldTraitGeneratorRequestBuilderImpl();
        $this->request = $useCaseResponseCommonFieldTraitGeneratorRequestBuilderImpl
            ->create()
            ->withEntityClassName(FunctionalEntity::class)
            ->withFields(['field1', 'field2', 'id', 'field3'])
            ->build();

        $this->useCaseResponseCommonFieldTraitGenerator = new UseCaseResponseCommonFieldTraitGenerator();

        $this->useCaseResponseCommonFieldTraitGenerator->setUseCaseResponseCommonFieldTraitSkeletonModelAssembler(
            new UseCaseResponseCommonFieldTraitSkeletonModelAssemblerMock()
        );
        $this->useCaseResponseCommonFieldTraitGenerator->setEntityFileObjectFactory(new EntityFileObjectFactoryMock());
        $this->useCaseResponseCommonFieldTraitGenerator->setUseCaseResponseFileObjectFactory(
            new UseCaseResponseFileObjectFactoryMock()
        );
        $this->useCaseResponseCommonFieldTraitGenerator->setTemplating(new TemplatingServiceMock());
        $this->useCaseResponseCommonFieldTraitGenerator->setFileObjectGateway(new InMemoryFileObjectGateway());
    }
}
