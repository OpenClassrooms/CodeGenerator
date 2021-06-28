<?php

declare(strict_types=1);

namespace OpenClassrooms\CodeGenerator\SkeletonModels\BusinessRules\Responders;

trait UseCaseResponseClassNameTrait
{
    public string $paginatedCollection;

    public string $paginatedUseCaseResponse;

    public string $paginatedUseCaseResponseBuilder;

    public string $pagination;

    public string $useCaseResponse;

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
