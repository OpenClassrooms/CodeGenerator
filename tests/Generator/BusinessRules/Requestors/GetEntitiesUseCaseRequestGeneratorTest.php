<?php declare(strict_types=1);

namespace OpenClassrooms\CodeGenerator\Tests\Generator\BusinessRules\Requestors;

use OpenClassrooms\CodeGenerator\Generator\BusinessRules\Requestors\DTO\Request\GetEntitiesUseCaseRequestGeneratorRequestBuilderImpl;
use OpenClassrooms\CodeGenerator\Generator\BusinessRules\Requestors\GetEntitiesUseCaseRequestGenerator;
use OpenClassrooms\CodeGenerator\Generator\BusinessRules\Requestors\Request\GetEntitiesUseCaseRequestGeneratorRequestBuilder;
use OpenClassrooms\CodeGenerator\Tests\Doubles\Entities\BusinessRules\Requestors\GetEntitiesUseCaseRequestFileObjectStub1;
use OpenClassrooms\CodeGenerator\Tests\Doubles\Entities\FileObjectTestCase;
use OpenClassrooms\CodeGenerator\Tests\Doubles\Entities\UseCaseRequestFileObjectFactoryMock;
use OpenClassrooms\CodeGenerator\Tests\Doubles\Gateways\FileObject\InMemoryFileObjectGateway;
use OpenClassrooms\CodeGenerator\Tests\Doubles\Services\Templating\TemplatingServiceMock;
use OpenClassrooms\CodeGenerator\Tests\Doubles\SkeletonModels\BusinessRules\Requestors\GetEntitiesUseCaseRequestSkeletonModelAssemblerMock;
use OpenClassrooms\CodeGenerator\Tests\Fixtures\Classes\BusinessRules\Entities\Domain\SubDomain\FunctionalEntity;
use PHPUnit\Framework\TestCase;

/**
 * @author Samuel Gomis <samuel.gomis@external.openclassrooms.com>
 */
class GetEntitiesUseCaseRequestGeneratorTest extends TestCase
{
    use FileObjectTestCase;

    /**
     * @var GetEntitiesUseCaseRequestGenerator
     */
    private $getEntitiesUseCaseRequestGenerator;

    /**
     * @var GetEntitiesUseCaseRequestGeneratorRequestBuilder
     */
    private $request;

    /**
     * @test
     */
    public function generate_ReturnFileObject()
    {
        $actualFileObject = $this->getEntitiesUseCaseRequestGenerator->generate($this->request);

        $this->assertSame(
            InMemoryFileObjectGateway::$fileObjects[$actualFileObject->getId()],
            $actualFileObject->getPath()
        );
        $this->assertFileObject(new GetEntitiesUseCaseRequestFileObjectStub1(), $actualFileObject);
    }

    protected function setUp()
    {
        $getEntitiesUseCaseRequestGeneratorRequestBuilderImpl = new GetEntitiesUseCaseRequestGeneratorRequestBuilderImpl();
        $this->request = $getEntitiesUseCaseRequestGeneratorRequestBuilderImpl
            ->create()
            ->withEntityClassName(FunctionalEntity::class)
            ->build();

        $this->getEntitiesUseCaseRequestGenerator = new GetEntitiesUseCaseRequestGenerator();

        $this->getEntitiesUseCaseRequestGenerator->setFileObjectGateway(new InMemoryFileObjectGateway());
        $this->getEntitiesUseCaseRequestGenerator->setGetEntitiesUseCaseRequestSkeletonModelAssembler(
            new GetEntitiesUseCaseRequestSkeletonModelAssemblerMock()
        );
        $this->getEntitiesUseCaseRequestGenerator->setTemplating(new TemplatingServiceMock());
        $this->getEntitiesUseCaseRequestGenerator->setUseCaseRequestFileObjectFactory(new UseCaseRequestFileObjectFactoryMock());
    }
}
