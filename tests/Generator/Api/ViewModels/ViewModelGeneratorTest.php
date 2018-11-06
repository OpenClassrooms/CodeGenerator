<?php declare(strict_types=1);

namespace OpenClassrooms\CodeGenerator\Generator\Tests\Api\ViewModels;

use OpenClassrooms\CodeGenerator\FileObjects\Impl\FileObjectFactoryImpl;
use OpenClassrooms\CodeGenerator\Generator\Api\ViewModels\DTO\Request\ViewModelGeneratorRequestBuilderImpl;
use OpenClassrooms\CodeGenerator\Generator\Api\ViewModels\Request\ViewModelGeneratorRequestBuilder;
use OpenClassrooms\CodeGenerator\Generator\Api\ViewModels\ViewModelGenerator;
use OpenClassrooms\CodeGenerator\Generator\SkeletonModels\ViewModels\ViewModel\Impl\ViewModelDetailAssemblerImpl;
use OpenClassrooms\CodeGenerator\Tests\Doubles\FileObjects\FileObjectGatewayMock;
use OpenClassrooms\CodeGenerator\Tests\Doubles\Services\Templating\TemplatingMock;
use OpenClassrooms\CodeGenerator\Tests\Fixtures\Classes\BusinessRules\UseCases\Domain\SubDomain\DTO\Responses\FunctionalEntityDetailResponseDTO;
use PHPUnit\Framework\TestCase;

/**
 * @author Samuel Gomis <samuel.gomis@external.openclassrooms.com>
 */
class ViewModelGeneratorTest extends TestCase
{
    /**
     * @var ViewModelGenerator
     */
    private $viewModelGenerator;

    /**
     * @var ViewModelGeneratorRequestBuilder
     */
    private $request;

    /**
     * @test
     */
    public function generate()
    {
        $actualFileObject = $this->viewModelGenerator->generate($this->request);
        $expectedGeneratedFileContent = __DIR__ . '/../../../Fixtures/Classes/Api/ViewModels/Domain/SubDomain/FunctionalEntity.php';

        $this->assertStringEqualsFile($expectedGeneratedFileContent, $actualFileObject->getContent());
    }

    public function setUp()
    {
        $viewModelGeneratorRequestBuilder = new ViewModelGeneratorRequestBuilderImpl();
        $this->request = $viewModelGeneratorRequestBuilder
            ->create()
            ->withClassName('BusinessRules\UseCases\Domain\SubDomain\DTO\Responses\\' . FunctionalEntityDetailResponseDTO::class)
            ->build();

        $this->viewModelGenerator = new ViewModelGenerator();
        $fileObjectFactory = new FileObjectFactoryImpl();
        $this->viewModelGenerator->setFileObjectFactory($fileObjectFactory);
        $this->viewModelGenerator->setFileObjectGateway(new FileObjectGatewayMock());
        $this->viewModelGenerator->setViewModelDetailAssembler(new ViewModelDetailAssemblerImpl());

        $this->viewModelGenerator->setTemplating(new TemplatingMock());

    }
}
