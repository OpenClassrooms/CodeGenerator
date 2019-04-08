<?php declare(strict_types=1);

namespace OpenClassrooms\CodeGenerator\Tests\Generator\BusinessRules\UseCases;

use OpenClassrooms\CodeGenerator\Generator\BusinessRules\UseCases\DTO\Request\GetFunctionalEntityGeneratorRequestBuilderImpl;
use OpenClassrooms\CodeGenerator\Generator\BusinessRules\UseCases\GetFunctionalEntityGenerator;
use OpenClassrooms\CodeGenerator\Generator\BusinessRules\UseCases\Request\GetFunctionalEntityGeneratorRequestBuilder;
use OpenClassrooms\CodeGenerator\SkeletonModels\BusinessRules\UseCases\Impl\GetFunctionalEntitySkeletonModelBuilderImpl;
use OpenClassrooms\CodeGenerator\Tests\Doubles\Entities\BusinessRules\UseCases\GetFunctionalEntityFileObjectStub1;
use OpenClassrooms\CodeGenerator\Tests\Doubles\Entities\EntityFileObjectFactoryMock;
use OpenClassrooms\CodeGenerator\Tests\Doubles\Entities\FileObjectTestCase;
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
class GetFunctionalEntityGeneratorTest extends TestCase
{
    use FileObjectTestCase;

    /**
     * @var GetFunctionalEntityGenerator
     */
    private $getFunctionalEntityGenerator;

    /**
     * @var GetFunctionalEntityGeneratorRequestBuilder
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
        $this->assertFileObject(new GetFunctionalEntityFileObjectStub1(), $actualFileObject);
    }

    protected function setUp()
    {
        $getFunctionalEntityGeneratorRequestBuilderImpl = new GetFunctionalEntityGeneratorRequestBuilderImpl();
        $this->request = $getFunctionalEntityGeneratorRequestBuilderImpl
            ->create()
            ->withEntity(FunctionalEntity::class)
            ->build();

        $this->getFunctionalEntityGenerator = new GetFunctionalEntityGenerator();

        $this->getFunctionalEntityGenerator->setEntityFileObjectFactory(new EntityFileObjectFactoryMock());
        $this->getFunctionalEntityGenerator->setUseCaseRequestFileObjectFactory(
            new UseCaseRequestFileObjectFactoryMock()
        );
        $this->getFunctionalEntityGenerator->setUseCaseResponseFileObjectFactory(
            new UseCaseResponseFileObjectFactoryMock()
        );
        $this->getFunctionalEntityGenerator->setUseCaseFileObjectFactory(
            new UseCaseFileObjectFactoryMock()
        );
        $getFunctionalEntitySkeletonModelBuilderImpl = new GetFunctionalEntitySkeletonModelBuilderImpl();
        $getFunctionalEntitySkeletonModelBuilderImpl->setUseCaseClassName(FixturesConfig::USE_CASE_NAMESPACE);
        $getFunctionalEntitySkeletonModelBuilderImpl->setUseCaseRequestClassName(
            FixturesConfig::USE_CASE_REQUEST_NAMESPACE
        );
        $this->getFunctionalEntityGenerator->setGetFunctionalEntitySkeletonModelBuilder(
            $getFunctionalEntitySkeletonModelBuilderImpl
        );
        $this->getFunctionalEntityGenerator->setTemplating(new TemplatingServiceMock());
        $this->getFunctionalEntityGenerator->setFileObjectGateway(new InMemoryFileObjectGateway());
    }
}
