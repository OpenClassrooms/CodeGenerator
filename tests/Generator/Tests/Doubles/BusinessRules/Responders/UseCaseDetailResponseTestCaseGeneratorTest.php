<?php declare(strict_types=1);

namespace OpenClassrooms\CodeGenerator\Tests\Generator\Tests\Doubles\BusinessRules\Responders;

use OpenClassrooms\CodeGenerator\Generator\Tests\Doubles\BusinessRules\Responders\DTO\Request\UseCaseDetailResponseTestCaseGeneratorRequestBuilderImpl;
use OpenClassrooms\CodeGenerator\Generator\Tests\Doubles\BusinessRules\Responders\Request\UseCaseDetailResponseTestCaseGeneratorRequestBuilder;
use OpenClassrooms\CodeGenerator\Generator\Tests\Doubles\BusinessRules\Responders\UseCaseDetailResponseTestCaseGenerator;
use OpenClassrooms\CodeGenerator\Tests\Doubles\Entities\FileObjectTestCase;
use OpenClassrooms\CodeGenerator\Tests\Doubles\Entities\Tests\Doubles\BusinessRules\Responders\UseCaseDetailResponseTestCaseFileObjectStub1;
use OpenClassrooms\CodeGenerator\Tests\Doubles\Entities\UseCaseResponseFileObjectFactoryMock;
use OpenClassrooms\CodeGenerator\Tests\Doubles\Gateways\FileObject\InMemoryFileObjectGateway;
use OpenClassrooms\CodeGenerator\Tests\Doubles\Services\Templating\TemplatingServiceMock;
use OpenClassrooms\CodeGenerator\Tests\Doubles\SkeletonModels\Tests\Doubles\BusinessRules\Responders\UseCaseDetailResponseTestCaseSkeletonModelAssemblerMock;
use OpenClassrooms\CodeGenerator\Tests\Fixtures\Classes\BusinessRules\Entities\Domain\SubDomain\FunctionalEntity;
use PHPUnit\Framework\TestCase;

class UseCaseDetailResponseTestCaseGeneratorTest extends TestCase
{
    use FileObjectTestCase;

    /**
     * @var UseCaseDetailResponseTestCaseGeneratorRequestBuilder
     */
    private $request;

    /**
     * @var UseCaseDetailResponseTestCaseGenerator
     */
    private $useCaseDetailResponseTestCaseGenerator;

    /**
     * @test
     */
    public function generate_ReturnFileObject(): void
    {
        $actualFileObject = $this->useCaseDetailResponseTestCaseGenerator->generate($this->request);

        $this->assertSame(
            InMemoryFileObjectGateway::$fileObjects[$actualFileObject->getId()]->getPath(),
            $actualFileObject->getPath()
        );
        $this->assertFileObject(new UseCaseDetailResponseTestCaseFileObjectStub1(), $actualFileObject);
    }

    protected function setUp(): void
    {
        $useCaseDetailResponseTestCaseGeneratorRequestBuilderImpl = new UseCaseDetailResponseTestCaseGeneratorRequestBuilderImpl(
        );
        $this->request = $useCaseDetailResponseTestCaseGeneratorRequestBuilderImpl
            ->create()
            ->withEntityClassName(FunctionalEntity::class)
            ->withFields(['field4'])
            ->build();

        $this->useCaseDetailResponseTestCaseGenerator = new UseCaseDetailResponseTestCaseGenerator();

        $this->useCaseDetailResponseTestCaseGenerator->setUseCaseResponseFileObjectFactory(
            new UseCaseResponseFileObjectFactoryMock()
        );
        $this->useCaseDetailResponseTestCaseGenerator->setFileObjectGateway(new InMemoryFileObjectGateway());
        $this->useCaseDetailResponseTestCaseGenerator->setTemplating(new TemplatingServiceMock());
        $this->useCaseDetailResponseTestCaseGenerator->setUseCaseDetailResponseTestCaseSkeletonModelAssembler(
            new UseCaseDetailResponseTestCaseSkeletonModelAssemblerMock()
        );
    }
}
