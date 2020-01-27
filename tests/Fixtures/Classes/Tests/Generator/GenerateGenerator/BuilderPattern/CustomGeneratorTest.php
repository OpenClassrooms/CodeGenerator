<?php

declare(strict_types=1);

namespace OpenClassrooms\CodeGenerator\Tests\Generator\GenerateGenerator;

use OpenClassrooms\CodeGenerator\Generator\GenerateGenerator\CustomGenerator;
use OpenClassrooms\CodeGenerator\Generator\GenerateGenerator\DTO\Request\CustomGeneratorRequestBuilderImpl;
use OpenClassrooms\CodeGenerator\Generator\GenerateGenerator\Request\CustomGeneratorRequestBuilder;
use OpenClassrooms\CodeGenerator\Tests\Doubles\Entities\FileObjectTestCase;
use OpenClassrooms\CodeGenerator\Tests\Doubles\Entities\GenerateGenerator\CustomFileObjectStub1;
use OpenClassrooms\CodeGenerator\Tests\Doubles\Gateways\FileObject\InMemoryFileObjectGateway;
use OpenClassrooms\CodeGenerator\Tests\Doubles\Services\Templating\TemplatingServiceMock;
use OpenClassrooms\CodeGenerator\Tests\Doubles\SkeletonModels\GenerateGenerator\CustomSkeletonModelBuilderMock;
use PHPUnit\Framework\TestCase;

class CustomGeneratorTest extends TestCase
{
    use FileObjectTestCase;

    /**
     * @var CustomGenerator
     */
    private $customGenerator;

    /**
     * @var CustomGeneratorRequestBuilder
     */
    private $request;

    /**
     * @test
     */
    final public function generate_ReturnFileObject(): void
    {
        $actualFileObject = $this->customGenerator->generate($this->request);

        $this->assertSame(
            InMemoryFileObjectGateway::$fileObjects[$actualFileObject->getId()]->getPath(),
            $actualFileObject->getPath()
        );
        $this->assertFileObject(new CustomFileObjectStub1(), $actualFileObject);
    }

    protected function setUp(): void
    {
        $customGeneratorRequestBuilderImpl = new CustomGeneratorRequestBuilderImpl();
        $this->request = $customGeneratorRequestBuilderImpl
            ->create()
            ->withEntityClassName('')
            ->build();

        $this->customGenerator = new CustomGenerator();

        $this->customGenerator->setCustomSkeletonModelBuilder(
            new CustomSkeletonModelBuilderMock()
        );
        $this->customGenerator->setTemplating(new TemplatingServiceMock());
        $this->customGenerator->setFileObjectGateway(new InMemoryFileObjectGateway());
    }
}
