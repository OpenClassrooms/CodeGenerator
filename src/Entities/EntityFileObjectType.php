<?php declare(strict_types=1);

namespace OpenClassrooms\CodeGenerator\Entities;

/**
 * @author Samuel Gomis <gomis.samuel@external.openclassrooms.com>
 */
final class EntityFileObjectType
{
    const BUSINESS_RULES_ENTITY = 'BUSINESS_RULES_ENTITY';

    const BUSINESS_RULES_ENTITY_NOT_FOUND_EXCEPTION = 'BUSINESS_RULES_ENTITY_EXCEPTION';

    const BUSINESS_RULES_ENTITY_GATEWAY = 'BUSINESS_RULES_ENTITY_GATEWAY';

    const BUSINESS_RULES_ENTITY_IMPL = 'BUSINESS_RULES_ENTITY_IMPL';

    const BUSINESS_RULES_ENTITY_STUB = 'BUSINESS_RULES_ENTITY_STUB';
}
