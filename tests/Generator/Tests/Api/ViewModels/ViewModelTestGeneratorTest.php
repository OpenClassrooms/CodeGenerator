<?php declare(strict_types=1);

namespace OpenClassrooms\CodeGenerator\Tests\Generator\Tests\Api\ViewModels;

use OpenClassrooms\CodeGenerator\FileObjects\Impl\UseCaseResponseFileObjectFactoryImpl;
use OpenClassrooms\CodeGenerator\FileObjects\Impl\ViewModelFileObjectFactoryImpl;
use OpenClassrooms\CodeGenerator\Generator\Tests\Api\ViewModels\DTO\Request\ViewModelTestGeneratorRequestBuilderImpl;
use OpenClassrooms\CodeGenerator\Generator\Tests\Api\ViewModels\Request\ViewModelTestGeneratorRequest;
use OpenClassrooms\CodeGenerator\Generator\Tests\Api\ViewModels\ViewModelTestGenerator;
use OpenClassrooms\CodeGenerator\Services\Impl\FieldObjectServiceImpl;
use OpenClassrooms\CodeGenerator\SkeletonModels\ViewModelTest\Impl\ViewModelTestSkeletonModelAssemblerImpl;
use OpenClassrooms\CodeGenerator\Tests\Doubles\Gateways\FileObject\InMemoryFileObjectGateway;
use OpenClassrooms\CodeGenerator\Tests\Doubles\Services\Templating\TemplatingMock;
use OpenClassrooms\CodeGenerator\Tests\Fixtures\Classes\BusinessRules\UseCases\Domain\SubDomain\DTO\Response\FunctionalEntityResponseDTO;
use OpenClassrooms\CodeGenerator\Tests\Fixtures\FixturesConfig;
use PHPUnit\Framework\TestCase;

/**
 * @author Samuel Gomis <samuel.gomis@external.openclassrooms.com>
 */
class ViewModelTestGeneratorTest extends TestCase
{
    /**
     * @var ViewModelTestGeneratorRequest
     */
    private $request;

    /**
     * @var ViewModelTestGenerator
     */
    private $viewModelTestGenerator;

    /**
     * @test
     */
    public function generate()
    {
        $actualFileObject = $this->viewModelTestGenerator->generate($this->request);

        $expectedGeneratedFileContent = __DIR__ . '/../../../Fixtures/Classes/Api/ViewModels/Domain/SubDomain/FunctionalEntity.php';

        $this->assertStringEqualsFile($expectedGeneratedFileContent, $actualFileObject->getContent());
    }

    protected function setUp()
    {
        $viewModelTestGeneratorRequestBuilder = new ViewModelTestGeneratorRequestBuilderImpl();
        $this->request = $viewModelTestGeneratorRequestBuilder
            ->create()
            ->withResponseClassName(FunctionalEntityResponseDTO::class)
            ->build();

        $this->viewModelTestGenerator = new ViewModelTestGenerator();
        $viewModelFileObjectFactory = new ViewModelFileObjectFactoryImpl();
        $viewModelFileObjectFactory->setBaseNamespace(FixturesConfig::BASE_NAMESPACE);
        $useCaseResponseFileObjectFactory = new UseCaseResponseFileObjectFactoryImpl();
        $useCaseResponseFileObjectFactory->setBaseNamespace(FixturesConfig::BASE_NAMESPACE);
        $this->viewModelTestGenerator->setUseCaseResponseFileObjectFactory($useCaseResponseFileObjectFactory);
        $this->viewModelTestGenerator->setViewModelFileObjectFactory($viewModelFileObjectFactory);
        $this->viewModelTestGenerator->setFileObjectGateway(new InMemoryFileObjectGateway());
        $this->viewModelTestGenerator->setFieldObjectService(new FieldObjectServiceImpl());
        $this->viewModelTestGenerator->setTemplating(new TemplatingMock());
        $this->viewModelTestGenerator->setViewModelTestSkeletonModelAssembler(
            new ViewModelTestSkeletonModelAssemblerImpl()
        );
    }
}
