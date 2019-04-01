<?php declare(strict_types=1);

namespace OpenClassrooms\CodeGenerator\Generator\Tests\App\Entity;

use OpenClassrooms\CodeGenerator\Entities\Impl\EntityFileObjectFactoryImpl;
use OpenClassrooms\CodeGenerator\Generator\App\Entity\DTO\Request\EntityImplGeneratorRequestBuilderImpl;
use OpenClassrooms\CodeGenerator\Generator\App\Entity\EntityImplGenerator;
use OpenClassrooms\CodeGenerator\Generator\App\Entity\Request\EntityImplGeneratorRequestBuilder;
use OpenClassrooms\CodeGenerator\SkeletonModels\App\Entity\Impl\EntityImplSkeletonModelAssemblerImpl;
use OpenClassrooms\CodeGenerator\Tests\Doubles\FileObjects\App\Entity\EntityImpl\EntityImplFileObjectStub1;
use OpenClassrooms\CodeGenerator\Tests\Doubles\FileObjects\FileObjectTestCase;
use OpenClassrooms\CodeGenerator\Tests\Doubles\Gateways\FileObject\InMemoryFileObjectGateway;
use OpenClassrooms\CodeGenerator\Tests\Doubles\Services\Templating\TemplatingServiceMock;
use OpenClassrooms\CodeGenerator\Tests\Fixtures\Classes\BusinessRules\Responders\Domain\SubDomain\FunctionalEntityResponse;
use OpenClassrooms\CodeGenerator\Tests\Fixtures\FixturesConfig;
use PHPUnit\Framework\TestCase;

/**
 * @author Samuel Gomis <samuel.gomis@external.openclassrooms.com>
 */
class EntityImplGeneratorTest extends TestCase
{
    use FileObjectTestCase;

    /**
     * @var EntityImplGenerator
     */
    private $entityImplGenerator;

    /**
     * @var EntityImplGeneratorRequestBuilder
     */
    private $request;

    /**
     * @test
     */
    public function generate_ReturnFileObject()
    {
        $actualFileObject = $this->entityImplGenerator->generate($this->request);

        $this->assertSame(
            InMemoryFileObjectGateway::$fileObjects[$actualFileObject->getId()],
            $actualFileObject->getPath()
        );
        $this->assertFileObject(new EntityImplFileObjectStub1(), $actualFileObject);
    }

    protected function setUp()
    {
        $entityImplGeneratorRequestBuilder = new EntityImplGeneratorRequestBuilderImpl();
        $this->request = $entityImplGeneratorRequestBuilder
            ->create()
            ->withClassName(FunctionalEntityResponse::class)
            ->build();

        $this->entityImplGenerator = new EntityImplGenerator();
        $entityFileObjectFactory = new EntityFileObjectFactoryImpl();
        $entityFileObjectFactory->setAppDir(FixturesConfig::APP_DIR);
        $entityFileObjectFactory->setBaseNamespace(FixturesConfig::BASE_NAMESPACE);
        $entityFileObjectFactory->setStubNamespace(FixturesConfig::STUB_NAMESPACE);
        $this->entityImplGenerator->setEntityFileObjectFactory($entityFileObjectFactory);
        $this->entityImplGenerator->setEntityImplSkeletonModelAssembler(new EntityImplSkeletonModelAssemblerImpl());
        $this->entityImplGenerator->setTemplating(new TemplatingServiceMock());
        $this->entityImplGenerator->setFileObjectGateway(new InMemoryFileObjectGateway());

    }
}
