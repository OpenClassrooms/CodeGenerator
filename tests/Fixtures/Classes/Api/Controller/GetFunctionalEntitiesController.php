<?php declare(strict_types=1);

namespace OpenClassrooms\CodeGenerator\Tests\Fixtures\Classes\Api\Controller;

use OC\ApiBundle\Framework\FrameworkBundle\Controller\AbstractApiController;
use OpenClassrooms\CodeGenerator\Tests\Fixtures\Classes\Api\ViewModels\Domain\SubDomain\FunctionalEntityViewModelListItem;
use OpenClassrooms\CodeGenerator\Tests\Fixtures\Classes\Api\ViewModels\Domain\SubDomain\FunctionalEntityViewModelListItemAssembler;
use OpenClassrooms\CodeGenerator\Tests\Fixtures\Classes\BusinessRules\Gateways\Domain\SubDomain\Exceptions\FunctionalEntityNotFoundException;
use OpenClassrooms\CodeGenerator\Tests\Fixtures\Classes\BusinessRules\Requestors\Domain\SubDomain\GetFunctionalEntitiesRequestBuilder;
use OpenClassrooms\CodeGenerator\Tests\Fixtures\Classes\BusinessRules\Responders\Domain\SubDomain\FunctionalEntityResponse;
use OpenClassrooms\CodeGenerator\Tests\Fixtures\Classes\BusinessRules\Responders\PaginatedUseCaseResponse;
use OpenClassrooms\CodeGenerator\Tests\Fixtures\Classes\BusinessRules\UseCases\Domain\SubDomain\GetFunctionalEntities;
use Symfony\Component\HttpFoundation\JsonResponse;

class GetFunctionalEntitiesController extends AbstractApiController
{
    /**
     * @Security("")
     */
    public function getAction(int $userId): JsonResponse
    {
        try {
            $functionalEntities = $this->getFunctionalEntities();

            $vm = $this->buildViewModel($functionalEntities);

            return $this->createJsonResponse($vm);
        } catch (FunctionalEntityNotFoundException $e) {
            throw $this->createNotFoundException();
        }
    }

    /**
     * @throws \OpenClassrooms\CodeGenerator\Tests\Fixtures\Classes\BusinessRules\Gateways\Domain\SubDomain\Exceptions\FunctionalEntityNotFoundException
     */
    private function getFunctionalEntities(): FunctionalEntityResponse
    {
        return $this->get(GetFunctionalEntities::class)->execute(
            $this->get(GetFunctionalEntitiesRequestBuilder::class)
                ->create()
                ->withFilters()
                ->withItemsPerPage()
                ->withPage()
                ->withSort()
                ->build()
        );
    }

    /**
     * @return FunctionalEntityViewModelListItem[]
     */
    private function buildViewModel(PaginatedUseCaseResponse $functionalEntities): array
    {
        return $this->get(FunctionalEntityViewModelListItemAssembler::class)->createListItems(
            $functionalEntities->getItems()
        );
    }
}
