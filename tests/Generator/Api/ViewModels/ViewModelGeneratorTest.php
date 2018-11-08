<?php declare(strict_types=1);

namespace OpenClassrooms\CodeGenerator\Generator\Tests\Api\ViewModels;

use OpenClassrooms\CodeGenerator\FileObjects\Impl\UseCaseResponseFileObjectFactoryImpl;
use OpenClassrooms\CodeGenerator\FileObjects\Impl\ViewModelFileObjectFactoryImpl;
use OpenClassrooms\CodeGenerator\Generator\Api\ViewModels\DTO\Request\ViewModelGeneratorRequestBuilderImpl;
use OpenClassrooms\CodeGenerator\Generator\Api\ViewModels\Request\ViewModelGeneratorRequestBuilder;
use OpenClassrooms\CodeGenerator\Generator\Api\ViewModels\ViewModelGenerator;
use OpenClassrooms\CodeGenerator\SkeletonModels\ViewModel\Impl\ViewModelSkeletonModelDetailAssemblerImpl;
use OpenClassrooms\CodeGenerator\Services\Impl\FieldObjectServiceImpl;
use OpenClassrooms\CodeGenerator\Tests\Doubles\FileObjects\FileObjectGatewayMock;
use OpenClassrooms\CodeGenerator\Tests\Doubles\Services\Templating\TemplatingMock;
use OpenClassrooms\CodeGenerator\Tests\Fixtures\Classes\BusinessRules\UseCases\Domain\SubDomain\DTO\Response\FunctionalEntityResponseDTO;
use OpenClassrooms\CodeGenerator\Tests\Fixtures\FixturesConfig;
use PHPUnit\Framework\TestCase;

/**
 * @author Samuel Gomis <samuel.gomis@external.openclassrooms.com>
 */
class ViewModelGeneratorTest extends TestCase
{
    /**
     * @var ViewModelGeneratorRequestBuilder
     */
    private $request;

    /**
     * @var ViewModelGenerator
     */
    private $viewModelGenerator;

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
            ->withClassName(FunctionalEntityResponseDTO::class)
            ->build();

        $this->viewModelGenerator = new ViewModelGenerator();
        $viewModelFileObjectFactory = new ViewModelFileObjectFactoryImpl();
        $viewModelFileObjectFactory->setBaseNamespace(FixturesConfig::BASE_NAMESPACE);
        $useCaseResponseFileObjectFactory = new UseCaseResponseFileObjectFactoryImpl();
        $useCaseResponseFileObjectFactory->setBaseNamespace(FixturesConfig::BASE_NAMESPACE);
        $this->viewModelGenerator->setUseCaseResponseFileObjectFactory($useCaseResponseFileObjectFactory);
        $this->viewModelGenerator->setViewModelFileObjectFactory($viewModelFileObjectFactory);
        $this->viewModelGenerator->setFileObjectGateway(new FileObjectGatewayMock());
        $this->viewModelGenerator->setFieldObjectService(new FieldObjectServiceImpl());
        $this->viewModelGenerator->setTemplating(new TemplatingMock());
        $this->viewModelGenerator->setViewModelSkeletonModelAssembler(new ViewModelSkeletonModelDetailAssemblerImpl());
    }
}
