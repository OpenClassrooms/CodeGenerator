<?php declare(strict_types=1);

namespace OpenClassrooms\CodeGenerator\Generator\Tests\Api\ViewModels;

use OpenClassrooms\CodeGenerator\FileObjects\Impl\UseCaseResponseFileObjectFactoryImpl;
use OpenClassrooms\CodeGenerator\FileObjects\Impl\ViewModelFileObjectFactoryImpl;
use OpenClassrooms\CodeGenerator\Generator\Api\ViewModels\DTO\Request\ViewModelGeneratorRequestBuilderImpl;
use OpenClassrooms\CodeGenerator\Generator\Api\ViewModels\Request\ViewModelGeneratorRequestBuilder;
use OpenClassrooms\CodeGenerator\Generator\Api\ViewModels\ViewModelGenerator;
use OpenClassrooms\CodeGenerator\Services\Impl\FieldObjectServiceImpl;
use OpenClassrooms\CodeGenerator\SkeletonModels\ViewModel\Impl\ViewModelSkeletonModelDetailAssemblerImpl;
use OpenClassrooms\CodeGenerator\Tests\Doubles\Gateways\FileObject\InMemoryFileObjectGateway;
use OpenClassrooms\CodeGenerator\Tests\Doubles\Services\Templating\TemplatingMock;
use OpenClassrooms\CodeGenerator\Tests\Fixtures\Classes\Api\ViewModels\Domain\SubDomain\FunctionalEntity;
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
        $fixtureFunctionalEntity = new \ReflectionClass(FunctionalEntity::class);
        $expectedGeneratedFileContent = __DIR__ . '/../../../Fixtures/Classes/Api/ViewModels/Domain/SubDomain/' .
            $fixtureFunctionalEntity->getShortName() . '.php';

        $this->assertSame(
            InMemoryFileObjectGateway::$fileObjects[$actualFileObject->getId()],
            $actualFileObject->getPath()
        );
        $this->assertStringEqualsFile($expectedGeneratedFileContent, $actualFileObject->getContent());
        $this->assertEquals($fixtureFunctionalEntity->getName(), $actualFileObject->getClassName());
        $this->assertEquals($fixtureFunctionalEntity->getNamespaceName(), $actualFileObject->getNamespace());
        $this->assertEquals($fixtureFunctionalEntity->getShortName(), $actualFileObject->getShortClassName());

        $actualFileObjectAccessors = $this->extractObjectProperties($actualFileObject->getFields(), 'getAccessor');
        $fixtureFunctionalEntityMethods = $this->extractObjectProperties(
            $fixtureFunctionalEntity->getMethods(),
            'getName'
        );
        $this->assertEquals($actualFileObjectAccessors, $fixtureFunctionalEntityMethods);

        $actualFileObjectDocComment = $this->extractObjectProperties($actualFileObject->getFields(), 'getDocComment');
        $fixtureFunctionalEntityDocComment = $this->extractObjectProperties(
            $fixtureFunctionalEntity->getProperties(),
            'getDocComment'
        );
        $this->assertEquals($actualFileObjectDocComment, $fixtureFunctionalEntityDocComment);

        $actualFileObjectPropertyName = $this->extractObjectProperties($actualFileObject->getFields(), 'getName');
        $fixtureFunctionalEntityPropertyName = $this->extractObjectProperties(
            $fixtureFunctionalEntity->getProperties(),
            'getName'
        );
        $this->assertEquals($actualFileObjectPropertyName, $fixtureFunctionalEntityPropertyName);

    }

    private function extractObjectProperties(array $objects, string $property): array 
    {
        $propertiesList = [];
        foreach ($objects as $object) {
            $propertiesList[] = $object->$property();
        }

        return $propertiesList;
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
        $this->viewModelGenerator->setFileObjectGateway(new InMemoryFileObjectGateway());
        $this->viewModelGenerator->setFieldObjectService(new FieldObjectServiceImpl());
        $this->viewModelGenerator->setTemplating(new TemplatingMock());
        $this->viewModelGenerator->setViewModelSkeletonModelAssembler(new ViewModelSkeletonModelDetailAssemblerImpl());
    }
}
