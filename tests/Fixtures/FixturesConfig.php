<?php

declare(strict_types=1);

namespace OpenClassrooms\CodeGenerator\Tests\Fixtures;

final class FixturesConfig
{
    public const API_DIR                             = 'Api\\';

    public const APP_DIR                             = 'App\\';

    public const BASE_NAMESPACE                      = 'OpenClassrooms\CodeGenerator\Tests\Fixtures\Classes\\';

    public const BASE_NAMESPACE_SELF_GENERATOR       = 'OpenClassrooms\CodeGenerator\\';

    public const ENTITY_UTIL                         = 'OpenClassrooms\CodeGenerator\Tests\EntityUtil';

    public const PAGINATED_COLLECTION                = 'OpenClassrooms\UseCase\BusinessRules\Entities\PaginatedCollection';

    public const PAGINATED_USE_CASE_RESPONSE         = 'OpenClassrooms\CodeGenerator\Tests\Fixtures\Classes\BusinessRules\Responders\PaginatedUseCaseResponse';

    public const PAGINATED_USE_CASE_RESPONSE_BUILDER = 'OpenClassrooms\CodeGenerator\Tests\Fixtures\Classes\BusinessRules\Responders\PaginatedUseCaseResponseBuilder';

    public const PAGINATED_COLLECTION_BUILDER_IMPL  = 'OpenClassrooms\UseCase\Application\Entity\PaginatedCollectionBuilderImpl';

    public const PAGINATED_COLLECTION_FACTORY       = 'OC\AppBundle\Repository\PaginatedCollectionFactory';

    public const PAGINATION                         = 'OpenClassrooms\CodeGenerator\Tests\Fixtures\Classes\BusinessRules\Gateways\Pagination';

    public const STUB_NAMESPACE                     = 'OpenClassrooms\CodeGenerator\Tests\Fixtures\Classes\Tests\Doubles\\';

    public const SECURITY                           = 'OpenClassrooms\UseCase\Application\Annotations\Security';

    public const STUB_NAMESPACE_SELF_GENERATOR      = 'OpenClassrooms\CodeGenerator\Tests\Doubles\\';

    public const TEST_BASE_NAMESPACE                = 'OpenClassrooms\CodeGenerator\Tests\Fixtures\Classes\Tests\\';

    public const TEST_BASE_NAMESPACE_SELF_GENERATOR = 'OpenClassrooms\CodeGenerator\Tests\\';

    public const TRANSACTION                        = 'OpenClassrooms\UseCase\Application\Annotations\Transaction';

    public const USE_CASE                           = 'OpenClassrooms\UseCase\BusinessRules\Requestors\UseCase';

    public const USE_CASE_REQUEST                   = 'OpenClassrooms\UseCase\BusinessRules\Requestors\UseCaseRequest';

    public const USE_CASE_RESPONSE                  = 'OpenClassrooms\CodeGenerator\Tests\Fixtures\Classes\BusinessRules\Responders\UseCaseResponse';

    public const ABSTRACT_CONTROLLER                = 'OC\ApiBundle\Framework\FrameworkBundle\Controller\AbstractApiController';

    public const COLLECTION_INFORMATION             = 'OC\ApiBundle\ParamConverter\CollectionInformation';

    /** @codeCoverageIgnore  */
    private function __construct()
    {
    }
}
