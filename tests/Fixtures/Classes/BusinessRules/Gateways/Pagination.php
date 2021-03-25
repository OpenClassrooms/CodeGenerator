<?php

declare(strict_types=1);

namespace OpenClassrooms\CodeGenerator\Tests\Fixtures\Classes\BusinessRules\Gateways;

final class Pagination
{
    public const DEFAULT_PAGE_NUMBER = 1;

    public const ITEMS_PER_PAGE = 'items per page';

    public const ITEMS_PER_PAGE_ADMIN = 20;

    public const ITEMS_PER_PAGE_ALL = 'items-per-page-all';

    public const ITEMS_PER_PAGE_DEFAULT = 20;

    public const PAGE = 'page';

    /** @codeCoverageIgnore */
    private function __construct()
    {
    }
}
