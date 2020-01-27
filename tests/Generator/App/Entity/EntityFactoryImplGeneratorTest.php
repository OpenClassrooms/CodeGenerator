<?php

declare(strict_types=1);

namespace OpenClassrooms\CodeGenerator\Tests\Generator\App\Entity;

use OpenClassrooms\CodeGenerator\Generator\App\Entity\DTO\Request\EntityFactoryImplGeneratorRequestBuilderImpl;
use OpenClassrooms\CodeGenerator\Generator\App\Entity\EntityFactoryImplGenerator;
use OpenClassrooms\CodeGenerator\Generator\App\Entity\Request\EntityFactoryImplGeneratorRequestBuilder;
use OpenClassrooms\CodeGenerator\Tests\Doubles\Entities\App\Entity\EntityFactoryImplFileObjectStub1;
use OpenClassrooms\CodeGenerator\Tests\Doubles\Entities\EntityFileObjectFactoryMock;
use OpenClassrooms\CodeGenerator\Tests\Doubles\Entities\FileObjectTestCase;
use OpenClassrooms\CodeGenerator\Tests\Doubles\Gateways\FileObject\InMemoryFileObjectGateway;
use OpenClassrooms\CodeGenerator\Tests\Doubles\Services\Templating\TemplatingServiceMock;
use OpenClassrooms\CodeGenerator\Tests\Doubles\SkeletonModels\App\Entity\EntityFactoryImplSkeletonModelAssemblerMock;
use OpenClassrooms\CodeGenerator\Tests\Fixtures\Classes\BusinessRules\Entities\Domain\SubDomain\FunctionalEntity;
use PHPUnit\Framework\TestCase;

class EntityFactoryImplGeneratorTest extends TestCase
{
    use FileObjectTestCase;

    /**
     * @var EntityFactoryImplGenerator
     */
    private $entityFactoryImplGenerator;

    /**
     * @var EntityFactoryImplGeneratorRequestBuilder
     */
    private $request;

    /**
     * @test
     */
    final public function generate_ReturnFileObject(): void
    {
        $actualFileObject = $this->entityFactoryImplGenerator->generate($this->request);

        $this->assertSame(
            InMemoryFileObjectGateway::$fileObjects[$actualFileObject->getId()]->getPath(),
            $actualFileObject->getPath()
        );
        $this->assertFileObject(new EntityFactoryImplFileObjectStub1(), $actualFileObject);
    }

    protected function setUp(): void
    {
        $entityFactoryImplGeneratorRequestBuilderImpl = new EntityFactoryImplGeneratorRequestBuilderImpl();
        $this->request = $entityFactoryImplGeneratorRequestBuilderImpl
            ->create()
            ->withEntityClassName(FunctionalEntity::class)
            ->build();

        $this->entityFactoryImplGenerator = new EntityFactoryImplGenerator();

        $this->entityFactoryImplGenerator->setEntityFactoryImplSkeletonModelAssembler(
            new EntityFactoryImplSkeletonModelAssemblerMock()
        );
        $this->entityFactoryImplGenerator->setEntityFileObjectFactory(new EntityFileObjectFactoryMock());
        $this->entityFactoryImplGenerator->setFileObjectGateway(new InMemoryFileObjectGateway());
        $this->entityFactoryImplGenerator->setTemplating(new TemplatingServiceMock());
    }
}
