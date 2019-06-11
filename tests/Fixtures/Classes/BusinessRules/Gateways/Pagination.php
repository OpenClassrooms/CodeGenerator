<?php declare(strict_types=1);

namespace OpenClassrooms\CodeGenerator\Tests\Fixtures\Classes\BusinessRules\Gateways;

/**
 * @author Romain Kuzniak <romain.kuzniak@openclassrooms.com>
 */
final class Pagination
{
    const DEFAULT_PAGE_NUMBER = 1;

    const ITEMS_PER_PAGE = 'items per page';

    const ITEMS_PER_PAGE_ADMIN = 20;

    const ITEMS_PER_PAGE_ALL = 'items-per-page-all';

    const ITEMS_PER_PAGE_DEFAULT = 20;

    const PAGE = 'page';

    /**
     * @codeCoverageIgnore
     */
    private function __construct()
    {
    }
}
