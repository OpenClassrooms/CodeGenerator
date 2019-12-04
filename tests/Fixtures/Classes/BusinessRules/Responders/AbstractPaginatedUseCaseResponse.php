<?php declare(strict_types=1);

namespace OpenClassrooms\CodeGenerator\Tests\Fixtures\Classes\BusinessRules\Responders;

abstract class AbstractPaginatedUseCaseResponse implements PaginatedUseCaseResponse
{
    /**
     * @var array
     */
    protected $items = [];

    /**
     * @var integer
     */
    protected $itemsPerPage;

    /**
     * @var integer
     */
    protected $page = 1;

    /**
     * @var integer
     */
    protected $totalItems;

    /**
     * @inheritDoc
     */
    public function count(): int
    {
        return count($this->items);
    }

    /**
     * @inheritdoc
     */
    public function getItems(): array
    {
        return $this->items;
    }

    /**
     * @return int
     */
    public function getItemsPerPage(): array
    {
        return $this->itemsPerPage;
    }

    /**
     * @inheritdoc
     */
    public function getIterator(): array
    {
        return new \ArrayIterator($this->items);
    }

    /**
     * @inheritdoc
     */
    public function getPage(): int
    {
        return $this->page;
    }

    /**
     * @inheritdoc
     */
    public function getTotalItems(): int
    {
        return $this->totalItems;
    }

    /**
     * @inheritdoc
     */
    public function getTotalPages(): int
    {
        if (null !== $this->itemsPerPage && 0 !== $this->itemsPerPage) {
            return (int) ceil($this->totalItems / $this->itemsPerPage);
        }

        return 1;

    }

    public function setItems($items): void
    {
        $this->items = $items;
    }

    public function setItemsPerPage($itemsPerPage): void
    {
        $this->itemsPerPage = $itemsPerPage;
    }

    public function setPage($page): void
    {
        $this->page = $page;
    }

    public function setTotalItems($totalItems): void
    {
        $this->totalItems = $totalItems;
    }
}
