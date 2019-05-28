<?php declare(strict_types=1);

namespace OpenClassrooms\CodeGenerator\Tests\Fixtures\Classes\BusinessRules\Responders;

/**
 * @author Samuel Gomis <samuel.gomis@external.openclassrooms.com>
 */
interface PaginatedUseCaseResponse extends UseCaseResponse, \IteratorAggregate, \Countable
{
    /**
     * @return array
     */
    public function getItems();

    /**
     * @return int
     */
    public function getItemsPerPage();

    public function getIterator();

    /**
     * @return int
     */
    public function getPage();

    /**
     * @return int
     */
    public function getTotalItems();

    /**
     * @return int
     */
    public function getTotalPages();
}
