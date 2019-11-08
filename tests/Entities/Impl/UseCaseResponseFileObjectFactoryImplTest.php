<?php declare(strict_types=1);

namespace Tests\FileObjects;

use OpenClassrooms\CodeGenerator\Entities\FileObject;
use OpenClassrooms\CodeGenerator\Entities\UseCaseResponseFileObjectFactory;
use OpenClassrooms\CodeGenerator\Entities\UseCaseResponseFileObjectType;
use OpenClassrooms\CodeGenerator\Tests\Doubles\Entities\UseCaseResponseFileObjectFactoryMock;
use OpenClassrooms\CodeGenerator\Tests\Fixtures\Classes\Api\ViewModels\Domain\SubDomain\FunctionalEntity;
use OpenClassrooms\CodeGenerator\Tests\Fixtures\FixturesConfig;
use OpenClassrooms\CodeGenerator\Tests\TestClassUtil;
use OpenClassrooms\CodeGenerator\Utility\FileObjectUtility;
use PHPUnit\Framework\TestCase;

/**
 * @author Samuel Gomis <samuel.gomis@external.openclassrooms.com>
 */
class UseCaseResponseFileObjectFactoryImplTest extends TestCase
{
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
    ): void {
        $actual = $this->factory->create($inputType, $domain, $entity, $baseNamespace);
        $this->assertSame($expected->getClassName(), $actual->getClassName());
    }

        public function fileObjectDataProvider(): array
    {
        [$baseNamespace, $domain, $entity] = FileObjectUtility::getBaseNamespaceDomainAndEntityNameFromClassName(
            FunctionalEntity::class
        );

        return [
            [
                UseCaseResponseFileObjectType::BUSINESS_RULES_USE_CASE_RESPONSE_COMMON_FIELD_TRAIT,
                $domain,
                $entity,
                $baseNamespace,
                self::getFileObjectBusinessRulesUseCaseResponseDto(),
            ],
            [
                UseCaseResponseFileObjectType::BUSINESS_RULES_USE_CASE_DETAIL_RESPONSE_DTO,
                $domain,
                $entity,
                $baseNamespace,
                self::getFileObjectBusinessRulesUseCaseDetailResponseDto(),
            ],
            [
                UseCaseResponseFileObjectType::BUSINESS_RULES_USE_CASE_LIST_ITEM_RESPONSE_DTO,
                $domain,
                $entity,
                $baseNamespace,
                self::getFileObjectBusinessRulesUseCaseListItemResponseDto(),
            ],
            [
                UseCaseResponseFileObjectType::BUSINESS_RULES_USE_CASE_RESPONSE_STUB,
                $domain,
                $entity,
                $baseNamespace,
                self::getFileObjectBusinessRulesUseCaseResponseStub(),
            ],
            [
                UseCaseResponseFileObjectType::BUSINESS_RULES_USE_CASE_DETAIL_RESPONSE_STUB,
                $domain,
                $entity,
                $baseNamespace,
                self::getFileObjectBusinessRulesUseCaseDetailResponseStub(),
            ],
            [
                UseCaseResponseFileObjectType::BUSINESS_RULES_USE_CASE_LIST_ITEM_RESPONSE_STUB,
                $domain,
                $entity,
                $baseNamespace,
                self::getFileObjectBusinessRulesUseCaseListItemResponseStub(),
            ],
            [
                UseCaseResponseFileObjectType::BUSINESS_RULES_USE_CASE_RESPONSE,
                $domain,
                $entity,
                $baseNamespace,
                self::getFileObjectBusinessRulesUseCaseResponse(),
            ],
            [
                UseCaseResponseFileObjectType::BUSINESS_RULES_USE_CASE_DETAIL_RESPONSE,
                $domain,
                $entity,
                $baseNamespace,
                self::getFileObjectBusinessRulesUseCaseDetailResponse(),
            ],
            [
                UseCaseResponseFileObjectType::BUSINESS_RULES_USE_CASE_LIST_ITEM_RESPONSE,
                $domain,
                $entity,
                $baseNamespace,
                self::getFileObjectBusinessRulesUseCaseListItemResponse(),
            ],
        ];
    }

    /**
     * @test
     * @expectedException \InvalidArgumentException
     */
    public function InvalidType_Create_ThrowException(): void
    {
        $this->factory->create('INVALID_TYPE', self::class, '');
    }

    private static function getEntityName(): string
    {
        return TestClassUtil::getShortClassName(FunctionalEntity::class);
    }

    private static function getFileObjectBusinessRulesUseCaseDetailResponse(): FileObject
    {
        return $useCaseResponseFileObject = new FileObject(
            FixturesConfig::BASE_NAMESPACE . 'BusinessRules\Responders\Domain\SubDomain\\' . self::getEntityName(
            ) . 'DetailResponse'
        );

    }

    private static function getFileObjectBusinessRulesUseCaseDetailResponseDto(): FileObject
    {
        return $useCaseResponseFileObject = new FileObject(
            FixturesConfig::BASE_NAMESPACE . 'BusinessRules\UseCases\Domain\SubDomain\DTO\Response\\' . self::getEntityName(
            ) . 'DetailResponseDTO'
        );

    }

    private static function getFileObjectBusinessRulesUseCaseDetailResponseStub(): FileObject
    {
        return $useCaseResponseFileObject = new FileObject(
            FixturesConfig::STUB_NAMESPACE . 'BusinessRules\Responders\Domain\SubDomain\\' . self::getEntityName(
            ) . 'DetailResponseStub1'
        );

    }

    private static function getFileObjectBusinessRulesUseCaseListItemResponse(): FileObject
    {
        return $useCaseResponseFileObject = new FileObject(
            FixturesConfig::BASE_NAMESPACE . 'BusinessRules\Responders\Domain\SubDomain\\' . self::getEntityName(
            ) . 'ListItemResponse'
        );

    }

    private static function getFileObjectBusinessRulesUseCaseListItemResponseDto(): FileObject
    {
        return $useCaseResponseFileObject = new FileObject(
            FixturesConfig::BASE_NAMESPACE . 'BusinessRules\UseCases\Domain\SubDomain\DTO\Response\\' . self::getEntityName(
            ) . 'ListItemResponseDTO'
        );

    }

    private static function getFileObjectBusinessRulesUseCaseListItemResponseStub(): FileObject
    {
        return $useCaseResponseFileObject = new FileObject(
            FixturesConfig::STUB_NAMESPACE . 'BusinessRules\Responders\Domain\SubDomain\\' . self::getEntityName(
            ) . 'ListItemResponseStub1'
        );

    }

    private static function getFileObjectBusinessRulesUseCaseResponse(): FileObject
    {
        return $useCaseResponseFileObject = new FileObject(
            FixturesConfig::BASE_NAMESPACE . 'BusinessRules\Responders\Domain\SubDomain\\' . self::getEntityName(
            ) . 'Response'
        );

    }

    private static function getFileObjectBusinessRulesUseCaseResponseDto(): FileObject
    {
        return $useCaseResponseFileObject = new FileObject(
            FixturesConfig::BASE_NAMESPACE . 'BusinessRules\UseCases\Domain\SubDomain\DTO\Response\\' . self::getEntityName(
            ) . 'ResponseCommonFieldTrait'
        );

    }

    private static function getFileObjectBusinessRulesUseCaseResponseStub(): FileObject
    {
        return $useCaseResponseFileObject = new FileObject(
            FixturesConfig::STUB_NAMESPACE . 'BusinessRules\Responders\Domain\SubDomain\\' . self::getEntityName(
            ) . 'ResponseStub1'
        );

    }

    protected function setUp(): void
    {
        $this->factory = new UseCaseResponseFileObjectFactoryMock();
    }
}
