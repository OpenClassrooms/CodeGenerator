<?php declare(strict_types=1);

namespace OpenClassrooms\CodeGenerator\Tests\Generator\BusinessRules\UseCases;

use OpenClassrooms\CodeGenerator\Generator\BusinessRules\UseCases\DTO\Request\GetEntitiesUseCaseRequestDTOGeneratorRequestBuilderImpl;
use OpenClassrooms\CodeGenerator\Generator\BusinessRules\UseCases\GetEntitiesUseCaseRequestDTOGenerator;
use OpenClassrooms\CodeGenerator\Generator\BusinessRules\UseCases\Request\GetEntitiesUseCaseRequestDTOGeneratorRequestBuilder;
use OpenClassrooms\CodeGenerator\Tests\Doubles\Entities\BusinessRules\UseCases\GetEntitiesUseCaseRequestDTOFileObjectStub1;
use OpenClassrooms\CodeGenerator\Tests\Doubles\Entities\FileObjectTestCase;
use OpenClassrooms\CodeGenerator\Tests\Doubles\Entities\UseCaseRequestFileObjectFactoryMock;
use OpenClassrooms\CodeGenerator\Tests\Doubles\Gateways\FileObject\InMemoryFileObjectGateway;
use OpenClassrooms\CodeGenerator\Tests\Doubles\Services\Templating\TemplatingServiceMock;
use OpenClassrooms\CodeGenerator\Tests\Doubles\SkeletonModels\BusinessRules\UseCases\GetEntitiesUseCaseRequestDTOSkeletonModelAssemblerMock;
use OpenClassrooms\CodeGenerator\Tests\Fixtures\Classes\BusinessRules\Entities\Domain\SubDomain\FunctionalEntity;
use PHPUnit\Framework\TestCase;

/**
 * @author Samuel Gomis <samuel.gomis@external.openclassrooms.com>
 */
class GetEntitiesUseCaseRequestDTOGeneratorTest extends TestCase
{
    use FileObjectTestCase;

    /**
     * @var GetEntitiesUseCaseRequestDTOGenerator
     */
    private $getEntitiesUseCaseRequestDTOGenerator;

    /**
     * @var GetEntitiesUseCaseRequestDTOGeneratorRequestBuilder
     */
    private $request;

    /**
     * @test
     */
    public function generate_ReturnFileObject()
    {
        $actualFileObject = $this->getEntitiesUseCaseRequestDTOGenerator->generate($this->request);

        $this->assertSame(
            InMemoryFileObjectGateway::$fileObjects[$actualFileObject->getId()],
            $actualFileObject->getPath()
        );
        $this->assertFileObject(new GetEntitiesUseCaseRequestDTOFileObjectStub1(), $actualFileObject);
    }

    protected function setUp()
    {
        $getEntitiesUseCaseRequestDTOGeneratorRequestBuilderImpl = new GetEntitiesUseCaseRequestDTOGeneratorRequestBuilderImpl();
        $this->request = $getEntitiesUseCaseRequestDTOGeneratorRequestBuilderImpl
            ->create()
            ->withEntityClassName(FunctionalEntity::class)
            ->build();

        $this->getEntitiesUseCaseRequestDTOGenerator = new GetEntitiesUseCaseRequestDTOGenerator();

        $this->getEntitiesUseCaseRequestDTOGenerator->setFileObjectGateway(new InMemoryFileObjectGateway());
        $this->getEntitiesUseCaseRequestDTOGenerator->setGetEntitiesUseCaseRequestDTOSkeletonModelAssembler(
            new GetEntitiesUseCaseRequestDTOSkeletonModelAssemblerMock()
        );
        $this->getEntitiesUseCaseRequestDTOGenerator->setTemplating(new TemplatingServiceMock());
        $this->getEntitiesUseCaseRequestDTOGenerator->setUseCaseRequestFileObjectFactory(new UseCaseRequestFileObjectFactoryMock());
    }
}