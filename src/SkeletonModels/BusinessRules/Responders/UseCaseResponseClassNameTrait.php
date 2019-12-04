<?php declare(strict_types=1);

namespace OpenClassrooms\CodeGenerator\SkeletonModels\BusinessRules\Responders;

trait UseCaseResponseClassNameTrait
{
    /**
     * @var string
     */
    public $paginatedCollection;

    /**
     * @var string
     */
    public $paginatedUseCaseResponse;

    /**
     * @var string
     */
    public $paginatedUseCaseResponseBuilder;

    /**
     * @var string
     */
    public $pagination;

    /**
     * @var string
     */
    public $useCaseResponse;

    public function setPaginatedCollection(string $paginatedCollection): void
    {
        $this->paginatedCollection = $paginatedCollection;
    }

    public function setPaginatedUseCaseResponse(string $paginatedUseCaseResponse): void
    {
        $this->paginatedUseCaseResponse = $paginatedUseCaseResponse;
    }

    public function setPaginatedUseCaseResponseBuilder(string $paginatedUseCaseResponseBuilder): void
    {
        $this->paginatedUseCaseResponseBuilder = $paginatedUseCaseResponseBuilder;
    }

    public function setPagination(string $pagination): void
    {
        $this->pagination = $pagination;
    }

    public function setUseCaseResponse(string $useCaseResponse): void
    {
        $this->useCaseResponse = $useCaseResponse;
    }
}
