<?php declare(strict_types=1);

namespace OpenClassrooms\CodeGenerator\FileObjects;

/**
 * @author Samuel Gomis <samuel.gomis@external.openclassrooms.com>
 */
final class UseCaseResponseFileObjectType
{
    const BUSINESS_RULES_USE_CASE_DETAIL_RESPONSE = 'BUSINESS_RULES_USE_CASE_DETAIL_RESPONSE';

    const BUSINESS_RULES_USE_CASE_DETAIL_RESPONSE_DTO = 'BUSINESS_RULES_USE_CASE_DETAIL_RESPONSE_DTO';

    const BUSINESS_RULES_USE_CASE_DETAIL_RESPONSE_STUB = 'BUSINESS_RULES_USE_CASE_DETAIL_RESPONSE_STUB';

    const BUSINESS_RULES_USE_CASE_LIST_ITEM_RESPONSE = 'BUSINESS_RULES_USE_CASE_LIST_ITEM_RESPONSE';

    const BUSINESS_RULES_USE_CASE_LIST_ITEM_RESPONSE_DTO = 'BUSINESS_RULES_USE_CASE_LIST_ITEM_RESPONSE_DTO';

    const BUSINESS_RULES_USE_CASE_LIST_ITEM_RESPONSE_STUB = 'BUSINESS_RULES_USE_CASE_LIST_ITEM_RESPONSE_STUB';

    const BUSINESS_RULES_USE_CASE_RESPONSE = 'BUSINESS_RULES_USE_CASE_RESPONSE';

    const BUSINESS_RULES_USE_CASE_RESPONSE_DTO = 'BUSINESS_RULES_USE_CASE_RESPONSE_DTO';

    const BUSINESS_RULES_USE_CASE_RESPONSE_STUB = 'BUSINESS_RULES_USE_CASE_RESPONSE_STUB';

    public static $shortName = [
        self::BUSINESS_RULES_USE_CASE_DETAIL_RESPONSE         => 'BusinessRulesUseCaseDetailResponse',
        self::BUSINESS_RULES_USE_CASE_DETAIL_RESPONSE_DTO     => 'BusinessRulesUseCaseDetailResponseDto',
        self::BUSINESS_RULES_USE_CASE_DETAIL_RESPONSE_STUB    => 'BusinessRulesUseCaseDetailResponseStub',
        self::BUSINESS_RULES_USE_CASE_LIST_ITEM_RESPONSE      => 'BusinessRulesUseCaseListItemResponse',
        self::BUSINESS_RULES_USE_CASE_LIST_ITEM_RESPONSE_DTO  => 'BusinessRulesUseCaseListItemResponseDto',
        self::BUSINESS_RULES_USE_CASE_LIST_ITEM_RESPONSE_STUB => 'BusinessRulesUseCaseListItemResponseStub',
        self::BUSINESS_RULES_USE_CASE_RESPONSE                => 'BusinessRulesUseCaseResponse',
        self::BUSINESS_RULES_USE_CASE_RESPONSE_DTO            => 'BusinessRulesUseCaseResponseDto',
        self::BUSINESS_RULES_USE_CASE_RESPONSE_STUB           => 'BusinessRulesUseCaseResponseStub',
    ];
}
