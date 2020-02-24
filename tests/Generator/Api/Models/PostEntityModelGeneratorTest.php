<?php

declare(strict_types=1);

namespace OpenClassrooms\CodeGenerator\Tests\Generator\Api\Models;

use OpenClassrooms\CodeGenerator\Generator\Api\Models\DTO\Request\PostEntityModelGeneratorRequestBuilderImpl;
use OpenClassrooms\CodeGenerator\Generator\Api\Models\PostEntityModelGenerator;
use OpenClassrooms\CodeGenerator\Generator\Api\Models\Request\PostEntityModelGeneratorRequestBuilder;
use OpenClassrooms\CodeGenerator\Tests\Doubles\Entities\Api\Models\Domain\SubDomain\PostEntityModelFileObjectStub1;
use OpenClassrooms\CodeGenerator\Tests\Doubles\Entities\FileObjectTestCase;
use OpenClassrooms\CodeGenerator\Tests\Doubles\Entities\ModelFileObjectFactoryMock;
use OpenClassrooms\CodeGenerator\Tests\Doubles\Gateways\FileObject\InMemoryFileObjectGateway;
use OpenClassrooms\CodeGenerator\Tests\Doubles\Services\Templating\TemplatingServiceMock;
use OpenClassrooms\CodeGenerator\Tests\Doubles\SkeletonModels\Api\Models\PostEntityModelSkeletonModelAssemblerMock;
use OpenClassrooms\CodeGenerator\Tests\Fixtures\Classes\BusinessRules\Entities\Domain\SubDomain\FunctionalEntity;
use PHPUnit\Framework\TestCase;

class PostEntityModelGeneratorTest extends TestCase
{
    use FileObjectTestCase;

    /**
     * @var PostEntityModelGenerator
     */
    private $postEntityModelGenerator;

    /**
     * @var PostEntityModelGeneratorRequestBuilder
     */
    private $request;

    /**
     * @test
     */
    final public function generate_ReturnFileObject(): void
    {
        $actualFileObject = $this->postEntityModelGenerator->generate($this->request);

        $this->assertSame(
            InMemoryFileObjectGateway::$fileObjects[$actualFileObject->getId()]->getPath(),
            $actualFileObject->getPath()
        );
        $this->assertFileObject(new PostEntityModelFileObjectStub1(), $actualFileObject);
    }

    protected function setUp(): void
    {
        $postEntityModelGeneratorRequestBuilderImpl = new PostEntityModelGeneratorRequestBuilderImpl();
        $this->request = $postEntityModelGeneratorRequestBuilderImpl
            ->create()
            ->withEntityClassName(FunctionalEntity::class)
            ->build();

        $this->postEntityModelGenerator = new PostEntityModelGenerator();

        $this->postEntityModelGenerator->setPostEntityModelSkeletonModelAssembler(
            new PostEntityModelSkeletonModelAssemblerMock()
        );
        $this->postEntityModelGenerator->setFileObjectGateway(new InMemoryFileObjectGateway());
        $this->postEntityModelGenerator->setModelFileObjectFactory(new ModelFileObjectFactoryMock());
        $this->postEntityModelGenerator->setTemplating(new TemplatingServiceMock());
    }
}
