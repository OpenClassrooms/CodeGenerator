<?php declare(strict_types=1);

namespace OpenClassrooms\CodeGenerator\Tests\Fixtures;

final class FixturesConfig
{
    const API_DIR                             = 'Api\\';

    const APP_DIR                             = 'App\\';

    const BASE_NAMESPACE                      = 'OpenClassrooms\CodeGenerator\Tests\Fixtures\Classes\\';

    const BASE_NAMESPACE_SELF_GENERATOR       = 'OpenClassrooms\CodeGenerator\\';

    const ENTITY_UTIL                         = 'OpenClassrooms\CodeGenerator\Tests\EntityUtil';

    const PAGINATED_COLLECTION                = 'OpenClassrooms\UseCase\BusinessRules\Entities\PaginatedCollection';

    const PAGINATED_USE_CASE_RESPONSE         = 'OpenClassrooms\CodeGenerator\Tests\Fixtures\Classes\BusinessRules\Responders\PaginatedUseCaseResponse';

    const PAGINATED_USE_CASE_RESPONSE_BUILDER = 'OpenClassrooms\CodeGenerator\Tests\Fixtures\Classes\BusinessRules\Responders\PaginatedUseCaseResponseBuilder';

    const PAGINATION                          = 'OpenClassrooms\CodeGenerator\Tests\Fixtures\Classes\BusinessRules\Gateways\Pagination';

    const STUB_NAMESPACE                      = 'OpenClassrooms\CodeGenerator\Tests\Fixtures\Classes\Tests\Doubles\\';

    const STUB_NAMESPACE_SELF_GENERATOR       = 'OpenClassrooms\CodeGenerator\Tests\Doubles\\';

    const TEST_BASE_NAMESPACE                 = 'OpenClassrooms\CodeGenerator\Tests\Fixtures\Classes\Tests\\';

    const TEST_BASE_NAMESPACE_SELF_GENERATOR  = 'OpenClassrooms\CodeGenerator\Tests\\';

    const TRANSACTION                         = 'OpenClassrooms\UseCase\Application\Annotations\Transaction';

    const USE_CASE                            = 'OpenClassrooms\UseCase\BusinessRules\Requestors\UseCase';

    const USE_CASE_REQUEST                    = 'OpenClassrooms\UseCase\BusinessRules\Requestors\UseCaseRequest';

    const USE_CASE_RESPONSE                   = 'OpenClassrooms\CodeGenerator\Tests\Fixtures\Classes\BusinessRules\Responders\UseCaseResponse';

    const ABSTRACT_CONTROLLER                 = 'OC\ApiBundle\Framework\FrameworkBundle\Controller\AbstractApiController';

    const COLLECTION_INFORMATION              = 'OC\ApiBundle\ParamConverter\CollectionInformation';
}
