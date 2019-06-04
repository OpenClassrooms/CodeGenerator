<?php declare(strict_types=1);

namespace OpenClassrooms\CodeGenerator\Tests\Generator\Tests\Doubles\BusinessRules\Responders;

use OpenClassrooms\CodeGenerator\Generator\Tests\Doubles\BusinessRules\Responders\DTO\Request\UseCaseResponseTestCaseGeneratorRequestBuilderImpl;
use OpenClassrooms\CodeGenerator\Generator\Tests\Doubles\BusinessRules\Responders\Request\UseCaseResponseTestCaseGeneratorRequestBuilder;
use OpenClassrooms\CodeGenerator\Generator\Tests\Doubles\BusinessRules\Responders\UseCaseResponseTestCaseGenerator;
use OpenClassrooms\CodeGenerator\Tests\Doubles\Entities\FileObjectTestCase;
use OpenClassrooms\CodeGenerator\Tests\Doubles\Entities\Tests\Doubles\BusinessRules\Responders\UseCaseResponseTestCaseFileObjectStub1;
use OpenClassrooms\CodeGenerator\Tests\Doubles\Entities\UseCaseResponseFileObjectFactoryMock;
use OpenClassrooms\CodeGenerator\Tests\Doubles\Gateways\FileObject\InMemoryFileObjectGateway;
use OpenClassrooms\CodeGenerator\Tests\Doubles\Services\Templating\TemplatingServiceMock;
use OpenClassrooms\CodeGenerator\Tests\Doubles\SkeletonModels\Tests\Doubles\BusinessRules\Responders\UseCaseResponseTestCaseSkeletonModelAssemblerMock;
use OpenClassrooms\CodeGenerator\Tests\Fixtures\Classes\BusinessRules\Entities\Domain\SubDomain\FunctionalEntity;
use PHPUnit\Framework\TestCase;

/**
 * @author Samuel Gomis <samuel.gomis@external.openclassrooms.com>
 */
class UseCaseResponseTestCaseGeneratorTest extends TestCase
{
    use FileObjectTestCase;

    /**
     * @var UseCaseResponseTestCaseGenerator
     */
    private $useCaseResponseTestCaseGenerator;

    /**
     * @var UseCaseResponseTestCaseGeneratorRequestBuilder
     */
    private $request;

    /**
     * @test
     */
    public function generate_ReturnFileObject()
    {
        $actualFileObject = $this->useCaseResponseTestCaseGenerator->generate($this->request);

        $this->assertSame(
            InMemoryFileObjectGateway::$fileObjects[$actualFileObject->getId()],
            $actualFileObject->getPath()
        );
        $this->assertFileObject(new UseCaseResponseTestCaseFileObjectStub1(), $actualFileObject);
    }

    protected function setUp()
    {
        $useCaseResponseTestCaseGeneratorRequestBuilderImpl = new UseCaseResponseTestCaseGeneratorRequestBuilderImpl();
        $this->request = $useCaseResponseTestCaseGeneratorRequestBuilderImpl
            ->create()
            ->withEntityClassName(FunctionalEntity::class)
            ->withFields(['field1','field2','field3','id'])
            ->build();

        $this->useCaseResponseTestCaseGenerator = new UseCaseResponseTestCaseGenerator();

        $this->useCaseResponseTestCaseGenerator->setFileObjectGateway(new InMemoryFileObjectGateway());
        $this->useCaseResponseTestCaseGenerator->setTemplating(new TemplatingServiceMock());
        $this->useCaseResponseTestCaseGenerator->setUseCaseResponseFileObjectFactory(new UseCaseResponseFileObjectFactoryMock());
        $this->useCaseResponseTestCaseGenerator->setUseCaseResponseTestCaseSkeletonModelAssembler(
            new UseCaseResponseTestCaseSkeletonModelAssemblerMock()
        );
    }
}
