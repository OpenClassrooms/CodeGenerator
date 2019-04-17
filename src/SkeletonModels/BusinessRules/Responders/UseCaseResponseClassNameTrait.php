<?php declare(strict_types=1);

namespace OpenClassrooms\CodeGenerator\SkeletonModels\BusinessRules\Responders;

/**
 * @author Samuel Gomis <gomis.samuel@external.openclassrooms.com>
 */
trait UseCaseResponseClassNameTrait
{
    /**
     * @var string
     */
    public $abstractPaginatedUseCaseResponse;

    /**
     * @var string
     */
    public $abstractPaginatedUseCaseResponseBuilder;

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
    public $useCaseResponse;

    public function setAbstractPaginatedUseCaseResponse(string $abstractPaginatedUseCaseResponse): void
    {
        $this->abstractPaginatedUseCaseResponse = $abstractPaginatedUseCaseResponse;
    }

    public function setAbstractPaginatedUseCaseResponseBuilder(string $abstractPaginatedUseCaseResponseBuilder): void
    {
        $this->abstractPaginatedUseCaseResponseBuilder = $abstractPaginatedUseCaseResponseBuilder;
    }

    public function setPaginatedUseCaseResponse(string $paginatedUseCaseResponse): void
    {
        $this->paginatedUseCaseResponse = $paginatedUseCaseResponse;
    }

    public function setPaginatedUseCaseResponseBuilder(string $paginatedUseCaseResponseBuilder): void
    {
        $this->paginatedUseCaseResponseBuilder = $paginatedUseCaseResponseBuilder;
    }

    public function setUseCaseResponse(string $useCaseResponse): void
    {
        $this->useCaseResponse = $useCaseResponse;
    }
}
