<?php declare(strict_types=1);

namespace OpenClassrooms\CodeGenerator\Tests\Fixtures\Classes\BusinessRules\Responders;

/**
 * @author Samuel Gomis <samuel.gomis@external.openclassrooms.com>
 */
interface PaginatedUseCaseResponseBuilder
{
    /**
     * @return PaginatedUseCaseResponseBuilder
     */
    public function create();

    /**
     * @return PaginatedUseCaseResponseBuilder
     */
    public function withItems($items);

    /**
     * @return PaginatedUseCaseResponseBuilder
     */
    public function withItemsPerPage($itemsPerPage);

    /**
     * @return PaginatedUseCaseResponseBuilder
     */
    public function withPage($page);

    /**
     * @return PaginatedUseCaseResponseBuilder
     */
    public function withTotalItems($totalItems);

    /**
     * @return PaginatedUseCaseResponse
     */
    public function build();
}
