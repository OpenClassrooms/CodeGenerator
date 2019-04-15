<?php declare(strict_types=1);

namespace OpenClassrooms\CodeGenerator\Tests\Generator\BusinessRules\UseCases;

use OpenClassrooms\CodeGenerator\Generator\BusinessRules\UseCases\DTO\Request\GetEntityGeneratorRequestBuilderImpl;
use OpenClassrooms\CodeGenerator\Generator\BusinessRules\UseCases\GetEntityGenerator;
use OpenClassrooms\CodeGenerator\Generator\BusinessRules\UseCases\Request\GetEntityGeneratorRequestBuilder;
use OpenClassrooms\CodeGenerator\SkeletonModels\BusinessRules\UseCases\Impl\GetEntitySkeletonModelBuilderImpl;
use OpenClassrooms\CodeGenerator\Tests\Doubles\Entities\BusinessRules\UseCases\GetEntityFileObjectStub1;
use OpenClassrooms\CodeGenerator\Tests\Doubles\Entities\EntityFileObjectFactoryMock;
use OpenClassrooms\CodeGenerator\Tests\Doubles\Entities\FileObjectTestCase;
use OpenClassrooms\CodeGenerator\Tests\Doubles\Entities\Tests\FileObjectFactoryPrefixType;
use OpenClassrooms\CodeGenerator\Tests\Doubles\Entities\UseCaseFileObjectFactoryMock;
use OpenClassrooms\CodeGenerator\Tests\Doubles\Entities\UseCaseRequestFileObjectFactoryMock;
use OpenClassrooms\CodeGenerator\Tests\Doubles\Entities\UseCaseResponseFileObjectFactoryMock;
use OpenClassrooms\CodeGenerator\Tests\Doubles\Gateways\FileObject\InMemoryFileObjectGateway;
use OpenClassrooms\CodeGenerator\Tests\Doubles\Services\Templating\TemplatingServiceMock;
use OpenClassrooms\CodeGenerator\Tests\Fixtures\Classes\BusinessRules\Entities\Domain\SubDomain\FunctionalEntity;
use OpenClassrooms\CodeGenerator\Tests\Fixtures\FixturesConfig;
use PHPUnit\Framework\TestCase;

/**
 * @author Samuel Gomis <samuel.gomis@external.openclassrooms.com>
 */
class GetEntityGeneratorTest extends TestCase
{
    use FileObjectTestCase;

    /**
     * @var GetEntityGenerator
     */
    private $getFunctionalEntityGenerator;

    /**
     * @var GetEntityGeneratorRequestBuilder
     */
    private $request;

    /**
     * @test
     */
    public function generate_ReturnFileObject()
    {
        $actualFileObject = $this->getFunctionalEntityGenerator->generate($this->request);

        $this->assertSame(
            InMemoryFileObjectGateway::$fileObjects[$actualFileObject->getId()],
            $actualFileObject->getPath()
        );
        $this->assertFileObject(new GetEntityFileObjectStub1(), $actualFileObject);
    }

    protected function setUp()
    {
        $getFunctionalEntityGeneratorRequestBuilderImpl = new GetEntityGeneratorRequestBuilderImpl();
        $this->request = $getFunctionalEntityGeneratorRequestBuilderImpl
            ->create()
            ->withEntity(FunctionalEntity::class)
            ->build();

        $this->getFunctionalEntityGenerator = new GetEntityGenerator();

        $this->getFunctionalEntityGenerator->setEntityFileObjectFactory(new EntityFileObjectFactoryMock());
        $this->getFunctionalEntityGenerator->setUseCaseRequestFileObjectFactory(
            new UseCaseRequestFileObjectFactoryMock(FileObjectFactoryPrefixType::GET)
        );
        $this->getFunctionalEntityGenerator->setUseCaseResponseFileObjectFactory(
            new UseCaseResponseFileObjectFactoryMock(FileObjectFactoryPrefixType::GET)
        );
        $this->getFunctionalEntityGenerator->setUseCaseFileObjectFactory(
            new UseCaseFileObjectFactoryMock(FileObjectFactoryPrefixType::GET)
        );
        $getFunctionalEntitySkeletonModelBuilderImpl = new GetEntitySkeletonModelBuilderImpl();
        $getFunctionalEntitySkeletonModelBuilderImpl->setUseCaseClassName(FixturesConfig::USE_CASE_NAMESPACE);
        $getFunctionalEntitySkeletonModelBuilderImpl->setUseCaseRequestClassName(
            FixturesConfig::USE_CASE_REQUEST_NAMESPACE
        );
        $this->getFunctionalEntityGenerator->setGetEntitySkeletonModelBuilder(
            $getFunctionalEntitySkeletonModelBuilderImpl
        );
        $this->getFunctionalEntityGenerator->setTemplating(new TemplatingServiceMock());
        $this->getFunctionalEntityGenerator->setFileObjectGateway(new InMemoryFileObjectGateway());
    }
}
