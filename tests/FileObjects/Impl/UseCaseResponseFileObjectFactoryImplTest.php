<?php declare(strict_types=1);

namespace Tests\FileObjects;

use OpenClassrooms\CodeGenerator\FileObjects\FileObject;
use OpenClassrooms\CodeGenerator\FileObjects\Impl\UseCaseResponseFileObjectFactoryImpl;
use OpenClassrooms\CodeGenerator\FileObjects\UseCaseResponseFileObjectFactory;
use OpenClassrooms\CodeGenerator\FileObjects\UseCaseResponseFileObjectType;
use OpenClassrooms\CodeGenerator\Tests\Fixtures\Classes\Api\ViewModels\Domain\SubDomain\FunctionalEntity;
use OpenClassrooms\CodeGenerator\Tests\TestClassUtil;
use OpenClassrooms\CodeGenerator\Utility\FileObjectUtility;
use PHPUnit\Framework\TestCase;

/**
 * @author Samuel Gomis <samuel.gomis@external.openclassrooms.com>
 */
class UseCaseResponseFileObjectFactoryImplTest extends TestCase
{
    const BASE_NAMESPACE = '';

    const DIR_NAME = 'Api\\';

    const STUB_NAMESPACE = self::TEST_BASE_NAMESPACE . 'Doubles\\';

    const TEST_BASE_NAMESPACE = 'Test\Base\Namespace\\';

    /**
     * @var UseCaseResponseFileObjectFactory
     */
    private $factory;

    /**
     * @test
     * @dataProvider fileObjectDataProvider
     */
    public function create_ReturnFileObject(string $inputType, string $domain, string $entity, FileObject $expected)
    {
        $actual = $this->factory->create($inputType, $domain, $entity);
        $this->assertSame($expected->getClassName(), $actual->getClassName());
    }

    public function fileObjectDataProvider()
    {
        [$baseNamespace, $domain, $entity] = FileObjectUtility::getBaseNamespaceDomainAndEntityNameFromClassName(FunctionalEntity::class);

        return [
            [
                UseCaseResponseFileObjectType::BUSINESS_RULES_USE_CASE_RESPONSE_DTO,
                $domain,
                $entity,
                self::GetFileObjectBusinessRulesUseCaseResponseDto(),
            ],
            [
                UseCaseResponseFileObjectType::BUSINESS_RULES_USE_CASE_DETAIL_RESPONSE_DTO,
                $domain,
                $entity,
                self::GetFileObjectBusinessRulesUseCaseDetailResponseDto(),
            ],
            [
                UseCaseResponseFileObjectType::BUSINESS_RULES_USE_CASE_LIST_ITEM_RESPONSE_DTO,
                $domain,
                $entity,
                self::GetFileObjectBusinessRulesUseCaseListItemResponseDto(),
            ],
            [
                UseCaseResponseFileObjectType::BUSINESS_RULES_USE_CASE_RESPONSE_STUB,
                $domain,
                $entity,
                self::GetFileObjectBusinessRulesUseCaseResponseStub(),
            ],
            [
                UseCaseResponseFileObjectType::BUSINESS_RULES_USE_CASE_DETAIL_RESPONSE_STUB,
                $domain,
                $entity,
                self::GetFileObjectBusinessRulesUseCaseDetailResponseStub(),
            ],
            [
                UseCaseResponseFileObjectType::BUSINESS_RULES_USE_CASE_LIST_ITEM_RESPONSE_STUB,
                $domain,
                $entity,
                self::GetFileObjectBusinessRulesUseCaseListItemResponseStub(),
            ],
            [
                UseCaseResponseFileObjectType::BUSINESS_RULES_USE_CASE_RESPONSE,
                $domain,
                $entity,
                self::GetFileObjectBusinessRulesUseCaseResponse(),
            ],
            [
                UseCaseResponseFileObjectType::BUSINESS_RULES_USE_CASE_DETAIL_RESPONSE,
                $domain,
                $entity,
                self::GetFileObjectBusinessRulesUseCaseDetailResponse(),
            ],
            [
                UseCaseResponseFileObjectType::BUSINESS_RULES_USE_CASE_LIST_ITEM_RESPONSE,
                $domain,
                $entity,
                self::GetFileObjectBusinessRulesUseCaseListItemResponse(),
            ],
        ];
    }

    private static function GetFileObjectBusinessRulesUseCaseResponseDto(): FileObject
    {
        $useCaseResponseFileObject = new FileObject();
        TestClassUtil::setProperty(
            'className',
            self::BASE_NAMESPACE . 'BusinessRules\UseCases\Domain\SubDomain\DTO\Response\\' . self::getEntityName(
            ) . 'ResponseDTO',
            $useCaseResponseFileObject
        );

        return $useCaseResponseFileObject;
    }

    private static function getEntityName(): string
    {
        return TestClassUtil::getShortClassName(FunctionalEntity::class);
    }

    private static function GetFileObjectBusinessRulesUseCaseDetailResponseDto(): FileObject
    {
        $useCaseResponseFileObject = new FileObject();
        TestClassUtil::setProperty(
            'className',
            self::BASE_NAMESPACE . 'BusinessRules\UseCases\Domain\SubDomain\DTO\Response\\' . self::getEntityName(
            ) . 'DetailResponseDTO',
            $useCaseResponseFileObject
        );

        return $useCaseResponseFileObject;
    }

    private static function GetFileObjectBusinessRulesUseCaseListItemResponseDto(): FileObject
    {
        $useCaseResponseFileObject = new FileObject();
        TestClassUtil::setProperty(
            'className',
            self::BASE_NAMESPACE . 'BusinessRules\UseCases\Domain\SubDomain\DTO\Response\\' . self::getEntityName(
            ) . 'ListItemResponseDTO',
            $useCaseResponseFileObject
        );

        return $useCaseResponseFileObject;
    }

    private static function GetFileObjectBusinessRulesUseCaseResponseStub(): FileObject
    {
        $useCaseResponseFileObject = new FileObject();
        TestClassUtil::setProperty(
            'className',
            self::STUB_NAMESPACE . 'BusinessRules\Responders\Domain\SubDomain\\' . self::getEntityName(
            ) . 'ResponseStub1',
            $useCaseResponseFileObject
        );

        return $useCaseResponseFileObject;
    }

    private static function GetFileObjectBusinessRulesUseCaseDetailResponseStub(): FileObject
    {
        $useCaseResponseFileObject = new FileObject();
        TestClassUtil::setProperty(
            'className',
            self::STUB_NAMESPACE . 'BusinessRules\Responders\Domain\SubDomain\\' . self::getEntityName(
            ) . 'DetailResponseStub1',
            $useCaseResponseFileObject
        );

        return $useCaseResponseFileObject;
    }

    private static function GetFileObjectBusinessRulesUseCaseListItemResponseStub(): FileObject
    {
        $useCaseResponseFileObject = new FileObject();
        TestClassUtil::setProperty(
            'className',
            self::STUB_NAMESPACE . 'BusinessRules\Responders\Domain\SubDomain\\' . self::getEntityName(
            ) . 'ListItemResponseStub1',
            $useCaseResponseFileObject
        );

        return $useCaseResponseFileObject;
    }

    private static function GetFileObjectBusinessRulesUseCaseResponse(): FileObject
    {
        $useCaseResponseFileObject = new FileObject();
        TestClassUtil::setProperty(
            'className',
            self::BASE_NAMESPACE . 'BusinessRules\Responders\Domain\SubDomain\\' . self::getEntityName() . 'Response',
            $useCaseResponseFileObject
        );

        return $useCaseResponseFileObject;
    }

    private static function GetFileObjectBusinessRulesUseCaseDetailResponse()
    {
        $useCaseResponseFileObject = new FileObject();
        TestClassUtil::setProperty(
            'className',
            self::BASE_NAMESPACE . 'BusinessRules\Responders\Domain\SubDomain\\' . self::getEntityName(
            ) . 'DetailResponse',
            $useCaseResponseFileObject
        );

        return $useCaseResponseFileObject;
    }

    private static function GetFileObjectBusinessRulesUseCaseListItemResponse()
    {
        $useCaseResponseFileObject = new FileObject();
        TestClassUtil::setProperty(
            'className',
            self::BASE_NAMESPACE . 'BusinessRules\Responders\Domain\SubDomain\\' . self::getEntityName(
            ) . 'ListItemResponse',
            $useCaseResponseFileObject
        );

        return $useCaseResponseFileObject;
    }

    /**
     * @test
     * @expectedException \InvalidArgumentException
     */
    public function InvalidTye_Create_ThrowException()
    {
        $this->factory->create('INVALID_TYPE', self::class, '');
    }

    protected function setUp()
    {
        $this->factory = new UseCaseResponseFileObjectFactoryImpl();
        $this->factory->setBaseNamespace(self::BASE_NAMESPACE);
        $this->factory->setTestsBaseNamespace(self::TEST_BASE_NAMESPACE);
        $this->factory->setStubNamespace(self::STUB_NAMESPACE);
        $this->factory->setApiDir(self::DIR_NAME);
    }
}
