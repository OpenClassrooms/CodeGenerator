<?php declare(strict_types=1);

namespace OpenClassrooms\CodeGenerator\Tests\Fixtures\Classes\Api\Controller;

use OC\ApiBundle\Framework\FrameworkBundle\Controller\AbstractApiController;
use OC\ApiBundle\ParamConverter\CollectionInformation;
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
     * @var FunctionalEntityViewModelListItemAssembler
     */
    private $functionalEntityViewModelListItemAssembler;

    /**
     * @var GetFunctionalEntitiesRequestBuilder
     */
    private $getFunctionalEntitiesRequestBuilder;

    public function __construct(
        FunctionalEntityViewModelListItemAssembler $assembler,
        GetFunctionalEntitiesRequestBuilder $builder
    ) {
        $this->functionalEntityViewModelListItemAssembler = $assembler;
        $this->getFunctionalEntitiesRequestBuilder = $builder;
    }

    /**
     * @Security("")
     * @ParamConverter("collectionInformation", options={"itemsPerPage":"200"}) // default 20 to remove if not necessary
     */
    public function getAction(CollectionInformation $collectionInformation, int $userId): JsonResponse
    {
        try {
            $functionalEntities = $this->getFunctionalEntities($collectionInformation);
            $vm = $this->buildViewModel($functionalEntities);

            return $this->createJsonResponse($vm);
        } catch (FunctionalEntityNotFoundException $e) {
            throw $this->throwNotFoundException();
        }
    }

    /**
     * @throws FunctionalEntityNotFoundException
     */
    private function getFunctionalEntities(collectionInformation $collectionInformation): FunctionalEntityResponse
    {
        return $this->get(GetFunctionalEntities::class)->execute(
            $this->getFunctionalEntitiesRequestBuilder
                ->create()
                ->withFilters($collectionInformation->getFilters())
                ->withItemsPerPage($collectionInformation->getItemsPerPage())
                ->withPage($collectionInformation->getPage())
                ->withSort($collectionInformation->getSorts())
                ->build()
        );
    }

    /**
     * @return FunctionalEntityViewModelListItem[]
     */
    private function buildViewModel(PaginatedUseCaseResponse $functionalEntities): array
    {
        return $this->functionalEntityViewModelListItemAssembler->createListItems(
            $functionalEntities->getItems()
        );
    }
}
