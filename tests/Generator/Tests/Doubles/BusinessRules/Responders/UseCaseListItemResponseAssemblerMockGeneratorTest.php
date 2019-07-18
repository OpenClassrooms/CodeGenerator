<?php declare(strict_types=1);

namespace OpenClassrooms\CodeGenerator\Tests\Generator\Tests\Doubles\BusinessRules\Responders;

use OpenClassrooms\CodeGenerator\Generator\Tests\Doubles\BusinessRules\Responders\DTO\Request\UseCaseListItemResponseAssemblerMockGeneratorRequestBuilderImpl;
use OpenClassrooms\CodeGenerator\Generator\Tests\Doubles\BusinessRules\Responders\Request\UseCaseListItemResponseAssemblerMockGeneratorRequestBuilder;
use OpenClassrooms\CodeGenerator\Generator\Tests\Doubles\BusinessRules\Responders\UseCaseListItemResponseAssemblerMockGenerator;
use OpenClassrooms\CodeGenerator\Tests\Doubles\Entities\FileObjectTestCase;
use OpenClassrooms\CodeGenerator\Tests\Doubles\Entities\Tests\Doubles\BusinessRules\Responders\UseCaseListItemResponseAssemblerMockFileObjectStub1;
use OpenClassrooms\CodeGenerator\Tests\Doubles\Entities\UseCaseResponseFileObjectFactoryMock;
use OpenClassrooms\CodeGenerator\Tests\Doubles\Gateways\FileObject\InMemoryFileObjectGateway;
use OpenClassrooms\CodeGenerator\Tests\Doubles\Services\Templating\TemplatingServiceMock;
use OpenClassrooms\CodeGenerator\Tests\Doubles\SkeletonModels\Tests\Doubles\BusinessRules\Responders\UseCaseListItemResponseAssemblerMockSkeletonModelAssemblerMock;
use OpenClassrooms\CodeGenerator\Tests\Fixtures\Classes\BusinessRules\Entities\Domain\SubDomain\FunctionalEntity;
use PHPUnit\Framework\TestCase;

/**
 * @author Samuel Gomis <samuel.gomis@external.openclassrooms.com>
 */
class UseCaseListItemResponseAssemblerMockGeneratorTest extends TestCase
{
    use FileObjectTestCase;

    /**
     * @var UseCaseListItemResponseAssemblerMockGeneratorRequestBuilder
     */
    private $request;

    /**
     * @var UseCaseListItemResponseAssemblerMockGenerator
     */
    private $useCaseListItemResponseAssemblerMockGenerator;

    /**
     * @test
     */
    public function generate_ReturnFileObject(): void
    {
        $actualFileObject = $this->useCaseListItemResponseAssemblerMockGenerator->generate($this->request);

        $this->assertSame(
            InMemoryFileObjectGateway::$fileObjects[$actualFileObject->getId()],
            $actualFileObject->getPath()
        );
        $this->assertFileObject(new UseCaseListItemResponseAssemblerMockFileObjectStub1(), $actualFileObject);
    }

    protected function setUp(): void
    {
        $useCaseListItemResponseAssemblerMockGeneratorRequestBuilderImpl = new UseCaseListItemResponseAssemblerMockGeneratorRequestBuilderImpl(
        );
        $this->request = $useCaseListItemResponseAssemblerMockGeneratorRequestBuilderImpl
            ->create()
            ->withEntityClassName(FunctionalEntity::class)
            ->build();

        $this->useCaseListItemResponseAssemblerMockGenerator = new UseCaseListItemResponseAssemblerMockGenerator();
        $this->useCaseListItemResponseAssemblerMockGenerator->setFileObjectGateway(new InMemoryFileObjectGateway());
        $this->useCaseListItemResponseAssemblerMockGenerator->setTemplating(new TemplatingServiceMock());
        $this->useCaseListItemResponseAssemblerMockGenerator->setUseCaseListItemResponseAssemblerMockSkeletonModelAssembler(
            new UseCaseListItemResponseAssemblerMockSkeletonModelAssemblerMock()
        );
        $this->useCaseListItemResponseAssemblerMockGenerator->setUseCaseResponseFileObjectFactory(
            new UseCaseResponseFileObjectFactoryMock()
        );
    }
}
