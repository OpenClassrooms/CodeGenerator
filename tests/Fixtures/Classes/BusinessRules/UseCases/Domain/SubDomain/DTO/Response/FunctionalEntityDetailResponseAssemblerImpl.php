<?php declare(strict_types=1);

namespace OpenClassrooms\CodeGenerator\Tests\Fixtures\Classes\BusinessRules\UseCases\Domain\SubDomain\DTO\Response;

use OpenClassrooms\CodeGenerator\Tests\Fixtures\Classes\BusinessRules\Entities\Domain\SubDomain\FunctionalEntity;
use OpenClassrooms\CodeGenerator\Tests\Fixtures\Classes\BusinessRules\Responders\Domain\SubDomain\FunctionalEntityDetailResponse;
use OpenClassrooms\CodeGenerator\Tests\Fixtures\Classes\BusinessRules\Responders\Domain\SubDomain\FunctionalEntityResponse;
use OpenClassrooms\UseCase\BusinessRules\Entities\PaginatedCollection;
use OpenClassrooms\UseCase\BusinessRules\Responders\PaginatedUseCaseResponse;
use OpenClassrooms\UseCase\BusinessRules\Responders\PaginatedUseCaseResponseBuilder;

/**
 * @author authorStub <author.stub@example.com>
 */
abstract class FunctionalEntityDetailResponseAssemblerImpl implements FunctionalEntityResponse
{
    /**
     * @var PaginatedUseCaseResponseBuilder
     */
    private $paginatedUseCaseResponseBuilder;

    /**
     * {@inheritdoc}
     */
    public function createFromPaginatedCollection(PaginatedCollection $sessions): PaginatedUseCaseResponse
    {
        return $this->paginatedUseCaseResponseBuilder
            ->create()
            ->withItems($this->createFromCollection($sessions->getItems()))
            ->withItemsPerPage($sessions->getItemsPerPage())
            ->withPage($sessions->getPage())
            ->withTotalItems($sessions->getTotalItems())
            ->build();
    }

    /**
     * {@inheritdoc}
     */
    public function createFromCollection(array $sessions = []): array
    {
        $items = [];

        foreach ($sessions as $session) {
            $items[] = $this->createFromFunctionalEntity($session);
        }

        return $items;
    }

    /**
     * {@inheritdoc}
     */
    public function createFromFunctionalEntity(FunctionalEntity $session): FunctionalEntityDetailResponse
    {
        return $this->hydrateCommonFields($session, new FunctionalEntityDetailResponseDTO());
    }

    /**
     * @param FunctionalEntityDetailResponseDTO $response
     *
     * @return FunctionalEntityDetailResponse
     */
    private function hydrateCommonFields(
        FunctionalEntity $session,
        FunctionalEntityDetailResponse $response
    ): FunctionalEntityDetailResponse
    {
        $response->field1 = $session->getField1();
        $response->field2 = $session->getField2();
        $response->field3 = $session->isField3();
        $response->id = $session->getId();

        return $response;
    }

    public function setPaginatedUseCaseResponseBuilder(PaginatedUseCaseResponseBuilder $builder)
    {
        $this->paginatedUseCaseResponseBuilder = $builder;
    }
}
