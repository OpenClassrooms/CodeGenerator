<?php declare(strict_types=1);

namespace OpenClassrooms\CodeGenerator\Tests\Generator\BusinessRules\UseCases;

use OpenClassrooms\CodeGenerator\Generator\BusinessRules\UseCases\DTO\Request\UseCaseResponseAssemblerTraitGeneratorRequestBuilderImpl;
use OpenClassrooms\CodeGenerator\Generator\BusinessRules\UseCases\Request\UseCaseResponseAssemblerTraitGeneratorRequestBuilder;
use OpenClassrooms\CodeGenerator\Generator\BusinessRules\UseCases\UseCaseResponseAssemblerTraitGenerator;
use OpenClassrooms\CodeGenerator\Tests\Doubles\Entities\BusinessRules\UseCases\UseCaseResponseAssemblerTraitFileObjectStub1;
use OpenClassrooms\CodeGenerator\Tests\Doubles\Entities\EntityFileObjectFactoryMock;
use OpenClassrooms\CodeGenerator\Tests\Doubles\Entities\FileObjectTestCase;
use OpenClassrooms\CodeGenerator\Tests\Doubles\Entities\UseCaseResponseFileObjectFactoryMock;
use OpenClassrooms\CodeGenerator\Tests\Doubles\Gateways\FileObject\InMemoryFileObjectGateway;
use OpenClassrooms\CodeGenerator\Tests\Doubles\Services\Templating\TemplatingServiceMock;
use OpenClassrooms\CodeGenerator\Tests\Doubles\SkeletonModels\BusinessRules\UseCases\UseCaseResponseAssemblerTraitSkeletonModelAssemblerMock;
use OpenClassrooms\CodeGenerator\Tests\Fixtures\Classes\BusinessRules\Entities\Domain\SubDomain\FunctionalEntity;
use PHPUnit\Framework\TestCase;

class UseCaseResponseAssemblerTraitGeneratorTest extends TestCase
{
    use FileObjectTestCase;

    /**
     * @var UseCaseResponseAssemblerTraitGeneratorRequestBuilder
     */
    private $request;

    /**
     * @var UseCaseResponseAssemblerTraitGenerator
     */
    private $useCaseResponseAssemblerTraitGenerator;

    /**
     * @test
     */
    public function generate_ReturnFileObject(): void
    {
        $actualFileObject = $this->useCaseResponseAssemblerTraitGenerator->generate($this->request);

        $this->assertSame(
            InMemoryFileObjectGateway::$fileObjects[$actualFileObject->getId()]->getPath(),
            $actualFileObject->getPath()
        );
        $this->assertFileObject(new UseCaseResponseAssemblerTraitFileObjectStub1(), $actualFileObject);
    }

    protected function setUp(): void
    {
        $useCaseResponseAssemblerTraitGeneratorRequestBuilderImpl = new UseCaseResponseAssemblerTraitGeneratorRequestBuilderImpl(
        );
        $this->request = $useCaseResponseAssemblerTraitGeneratorRequestBuilderImpl
            ->create()
            ->withEntityClassName(FunctionalEntity::class)
            ->withFields(['field1', 'field2', 'id', 'field3'])
            ->build();

        $this->useCaseResponseAssemblerTraitGenerator = new UseCaseResponseAssemblerTraitGenerator();

        $this->useCaseResponseAssemblerTraitGenerator->setUseCaseResponseAssemblerTraitSkeletonModelAssembler(
            new UseCaseResponseAssemblerTraitSkeletonModelAssemblerMock()
        );
        $this->useCaseResponseAssemblerTraitGenerator->setEntityFileObjectFactory(new EntityFileObjectFactoryMock());
        $this->useCaseResponseAssemblerTraitGenerator->setUseCaseResponseFileObjectFactory(
            new UseCaseResponseFileObjectFactoryMock()
        );
        $this->useCaseResponseAssemblerTraitGenerator->setTemplating(new TemplatingServiceMock());
        $this->useCaseResponseAssemblerTraitGenerator->setFileObjectGateway(new InMemoryFileObjectGateway());
    }
}
