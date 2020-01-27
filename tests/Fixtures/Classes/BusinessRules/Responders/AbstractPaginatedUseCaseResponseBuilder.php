<?php

declare(strict_types=1);

namespace OpenClassrooms\CodeGenerator\Tests\Fixtures\Classes\BusinessRules\Responders;

abstract class AbstractPaginatedUseCaseResponseBuilder implements PaginatedUseCaseResponseBuilder
{
    /**
     * @var AbstractPaginatedUseCaseResponse
     */
    protected $paginatedUseCaseResponse;

    /**
     * {@inheritdoc}
     */
    public function build(): AbstractPaginatedUseCaseResponse
    {
        return $this->paginatedUseCaseResponse;
    }

    /**
     * {@inheritdoc}
     */
    public function withItems($items): AbstractPaginatedUseCaseResponseBuilder
    {
        $this->paginatedUseCaseResponse->setItems($items);

        return $this;
    }

    /**
     * {@inheritdoc}
     */
    public function withItemsPerPage($itemsPerPage): AbstractPaginatedUseCaseResponseBuilder
    {
        $this->paginatedUseCaseResponse->setItemsPerPage($itemsPerPage);

        return $this;
    }

    /**
     * {@inheritdoc}
     */
    public function withPage($page): AbstractPaginatedUseCaseResponseBuilder
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
}
