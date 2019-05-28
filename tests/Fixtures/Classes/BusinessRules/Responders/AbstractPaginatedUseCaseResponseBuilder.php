<?php declare(strict_types=1);

namespace OpenClassrooms\CodeGenerator\Tests\Fixtures\Classes\BusinessRules\Responders;

/**
 * @author Samuel Gomis <samuel.gomis@external.openclassrooms.com>
 */
abstract class AbstractPaginatedUseCaseResponseBuilder implements PaginatedUseCaseResponseBuilder
{
    /**
     * @var AbstractPaginatedUseCaseResponse
     */
    protected $paginatedUseCaseResponse;

    /**
     * {@inheritdoc}
     */
    public function withItems($items)
    {
        $this->paginatedUseCaseResponse->setItems($items);

        return $this;
    }

    /**
     * {@inheritdoc}
     */
    public function withItemsPerPage($itemsPerPage)
    {
        $this->paginatedUseCaseResponse->setItemsPerPage($itemsPerPage);

        return $this;
    }

    /**
     * {@inheritdoc}
     */
    public function withPage($page)
    {
        $this->paginatedUseCaseResponse->setPage($page);

        return $this;
    }

    /**
     * {@inheritdoc}
     */
    public function withTotalItems($totalItems)
    {
        $this->paginatedUseCaseResponse->setTotalItems($totalItems);

        return $this;
    }

    /**
     * {@inheritdoc}
     */
    public function build()
    {
        return $this->paginatedUseCaseResponse;
    }
}
