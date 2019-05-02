<?php declare(strict_types=1);

namespace Tests\FileObjects;

use OpenClassrooms\CodeGenerator\Entities\FileObject;
use OpenClassrooms\CodeGenerator\Entities\UseCaseResponseFileObjectFactory;
use OpenClassrooms\CodeGenerator\Entities\UseCaseResponseFileObjectType;
use OpenClassrooms\CodeGenerator\Tests\Doubles\Entities\UseCaseResponseFileObjectFactoryMock;
use OpenClassrooms\CodeGenerator\Tests\Fixtures\Classes\Api\ViewModels\Domain\SubDomain\FunctionalEntity;
use OpenClassrooms\CodeGenerator\Tests\TestClassUtil;
use OpenClassrooms\CodeGenerator\Utility\FileObjectUtility;
use PHPUnit\Framework\TestCase;

/**
 * @author Samuel Gomis <samuel.gomis@external.openclassrooms.com>
 */
class UseCaseResponseFileObjectFactoryImplTest extends TestCase
{
    const BASE_NAMESPACE = 'OpenClassrooms\CodeGenerator\Tests\Fixtures\Classes\\';

    const DIR_NAME = 'Api\\';

    const STUB_NAMESPACE = self::BASE_NAMESPACE . 'tests\Doubles\\';

    const TEST_BASE_NAMESPACE = self::BASE_NAMESPACE . 'Tests\\';

    /**
     * @var UseCaseResponseFileObjectFactory
     */
    private $factory;

    /**
     * @test
     * @dataProvider fileObjectDataProvider
     */
    public function create_ReturnFileObject(
        string $inputType,
        string $domain,
        string $entity,
        string $baseNamespace,
        FileObject $expected
    )
    {
        $actual = $this->factory->create($inputType, $domain, $entity, $baseNamespace);
        $this->assertSame($expected->getClassName(), $actual->getClassName());
    }

    public function fileObjectDataProvider()
    {
        [$baseNamespace, $domain, $entity] = FileObjectUtility::getBaseNamespaceDomainAndEntityNameFromClassName(
            FunctionalEntity::class
        );

        return [
            [
                UseCaseResponseFileObjectType::BUSINESS_RULES_USE_CASE_RESPONSE_DTO,
                $domain,
                $entity,
                $baseNamespace,
                self::GetFileObjectBusinessRulesUseCaseResponseDto(),
            ],
            [
                UseCaseResponseFileObjectType::BUSINESS_RULES_USE_CASE_DETAIL_RESPONSE_DTO,
                $domain,
                $entity,
                $baseNamespace,
                self::GetFileObjectBusinessRulesUseCaseDetailResponseDto(),
            ],
            [
                UseCaseResponseFileObjectType::BUSINESS_RULES_USE_CASE_LIST_ITEM_RESPONSE_DTO,
                $domain,
                $entity,
                $baseNamespace,
                self::GetFileObjectBusinessRulesUseCaseListItemResponseDto(),
            ],
            [
                UseCaseResponseFileObjectType::BUSINESS_RULES_USE_CASE_RESPONSE_STUB,
                $domain,
                $entity,
                $baseNamespace,
                self::GetFileObjectBusinessRulesUseCaseResponseStub(),
            ],
            [
                UseCaseResponseFileObjectType::BUSINESS_RULES_USE_CASE_DETAIL_RESPONSE_STUB,
                $domain,
                $entity,
                $baseNamespace,
                self::GetFileObjectBusinessRulesUseCaseDetailResponseStub(),
            ],
            [
                UseCaseResponseFileObjectType::BUSINESS_RULES_USE_CASE_LIST_ITEM_RESPONSE_STUB,
                $domain,
                $entity,
                $baseNamespace,
                self::GetFileObjectBusinessRulesUseCaseListItemResponseStub(),
            ],
            [
                UseCaseResponseFileObjectType::BUSINESS_RULES_USE_CASE_RESPONSE,
                $domain,
                $entity,
                $baseNamespace,
                self::GetFileObjectBusinessRulesUseCaseResponse(),
            ],
            [
                UseCaseResponseFileObjectType::BUSINESS_RULES_USE_CASE_DETAIL_RESPONSE,
                $domain,
                $entity,
                $baseNamespace,
                self::GetFileObjectBusinessRulesUseCaseDetailResponse(),
            ],
            [
                UseCaseResponseFileObjectType::BUSINESS_RULES_USE_CASE_LIST_ITEM_RESPONSE,
                $domain,
                $entity,
                $baseNamespace,
                self::GetFileObjectBusinessRulesUseCaseListItemResponse(),
            ],
        ];
    }

    private static function GetFileObjectBusinessRulesUseCaseResponseDto(): FileObject
    {
        return $useCaseResponseFileObject = new FileObject(
            self::BASE_NAMESPACE . 'BusinessRules\UseCases\Domain\SubDomain\DTO\Response\\' . self::getEntityName(
            ) . 'ResponseDTO'
        );

    }

    private static function getEntityName(): string
    {
        return TestClassUtil::getShortClassName(FunctionalEntity::class);
    }

    private static function GetFileObjectBusinessRulesUseCaseDetailResponseDto(): FileObject
    {
        return $useCaseResponseFileObject = new FileObject(
            self::BASE_NAMESPACE . 'BusinessRules\UseCases\Domain\SubDomain\DTO\Response\\' . self::getEntityName(
            ) . 'DetailResponseDTO'
        );

    }

    private static function GetFileObjectBusinessRulesUseCaseListItemResponseDto(): FileObject
    {
        return $useCaseResponseFileObject = new FileObject(
            self::BASE_NAMESPACE . 'BusinessRules\UseCases\Domain\SubDomain\DTO\Response\\' . self::getEntityName(
            ) . 'ListItemResponseDTO'
        );

    }

    private static function GetFileObjectBusinessRulesUseCaseResponseStub(): FileObject
    {
        return $useCaseResponseFileObject = new FileObject(
            self::STUB_NAMESPACE . 'BusinessRules\Responders\Domain\SubDomain\\' . self::getEntityName(
            ) . 'ResponseStub1'
        );

    }

    private static function GetFileObjectBusinessRulesUseCaseDetailResponseStub(): FileObject
    {
        return $useCaseResponseFileObject = new FileObject(
            self::STUB_NAMESPACE . 'BusinessRules\Responders\Domain\SubDomain\\' . self::getEntityName(
            ) . 'DetailResponseStub1'
        );

    }

    private static function GetFileObjectBusinessRulesUseCaseListItemResponseStub(): FileObject
    {
        return $useCaseResponseFileObject = new FileObject(
            self::STUB_NAMESPACE . 'BusinessRules\Responders\Domain\SubDomain\\' . self::getEntityName(
            ) . 'ListItemResponseStub1'
        );

    }

    private static function GetFileObjectBusinessRulesUseCaseResponse(): FileObject
    {
        return $useCaseResponseFileObject = new FileObject(
            self::BASE_NAMESPACE . 'BusinessRules\Responders\Domain\SubDomain\\' . self::getEntityName() . 'Response'
        );

    }

    private static function GetFileObjectBusinessRulesUseCaseDetailResponse()
    {
        return $useCaseResponseFileObject = new FileObject(
            self::BASE_NAMESPACE . 'BusinessRules\Responders\Domain\SubDomain\\' . self::getEntityName(
            ) . 'DetailResponse'
        );

    }

    private static function GetFileObjectBusinessRulesUseCaseListItemResponse()
    {
        return $useCaseResponseFileObject = new FileObject(
            self::BASE_NAMESPACE . 'BusinessRules\Responders\Domain\SubDomain\\' . self::getEntityName(
            ) . 'ListItemResponse'
        );

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
        $this->factory = new UseCaseResponseFileObjectFactoryMock();
    }
}
