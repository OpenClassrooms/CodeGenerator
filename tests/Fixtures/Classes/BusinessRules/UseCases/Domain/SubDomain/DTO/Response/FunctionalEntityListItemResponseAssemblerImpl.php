<?php declare(strict_types=1);
// Auto Generated by OpenClassrooms Code Generator

namespace OpenClassrooms\CodeGenerator\Tests\Fixtures\Classes\BusinessRules\UseCases\Domain\SubDomain\DTO\Response;

use OpenClassrooms\CodeGenerator\Tests\Fixtures\Classes\BusinessRules\Entities\Domain\SubDomain\FunctionalEntity;
use OpenClassrooms\CodeGenerator\Tests\Fixtures\Classes\BusinessRules\Responders\Domain\SubDomain\FunctionalEntityListItemResponse;
use OpenClassrooms\CodeGenerator\Tests\Fixtures\Classes\BusinessRules\Responders\Domain\SubDomain\FunctionalEntityListItemResponseAssembler;
use OpenClassrooms\UseCase\BusinessRules\Entities\PaginatedCollection;
use OpenClassrooms\UseCase\BusinessRules\Responders\PaginatedUseCaseResponse;
use OpenClassrooms\UseCase\BusinessRules\Responders\PaginatedUseCaseResponseBuilder;

/**
 * @author authorStub <author.stub@example.com>
 */
class FunctionalEntityListItemResponseAssemblerImpl implements FunctionalEntityListItemResponseAssembler
{
    use FunctionalEntityResponseTrait;

    /**
     * @var PaginatedUseCaseResponseBuilder
     */
    private $paginatedUseCaseResponseBuilder;

    /**
     * {@inheritdoc}
     */
    public function createPaginatedCollection(PaginatedCollection $collection): PaginatedUseCaseResponse
    {
        return $this->paginatedUseCaseResponseBuilder
            ->create()
            ->withItems($this->createFromCollection($collection->getItems()))
            ->withItemsPerPage($collection->getItemsPerPage())
            ->withPage($collection->getPage())
            ->withTotalItems($collection->getTotalItems())
            ->build();
    }

    /**
     * {@inheritdoc}
     */
    private function createFromCollection(array $collection = []): array
    {
        $items = [];

        foreach ($collection as $entity) {
            $items[] = $this->create($entity);
        }

        return $items;
    }

    /**
     * {@inheritdoc}
     */
    public function create(FunctionalEntity $entity): FunctionalEntityListItemResponse
    {
        $response = new FunctionalEntityListItemResponseDTO();
        $this->hydrateCommonFields($entity, $response);

        return $response;
    }

    public function setPaginatedUseCaseResponseBuilder(PaginatedUseCaseResponseBuilder $builder)
    {
        $this->paginatedUseCaseResponseBuilder = $builder;
    }
}
