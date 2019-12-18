<?php declare(strict_types=1);

namespace OpenClassrooms\CodeGenerator\Tests\Fixtures\Classes\Api\Controller;

use OC\ApiBundle\Framework\FrameworkBundle\Controller\AbstractApiController;
use OpenClassrooms\CodeGenerator\Tests\Fixtures\Classes\BusinessRules\Gateways\Domain\SubDomain\Exceptions\FunctionalEntityNotFoundException;
use OpenClassrooms\CodeGenerator\Tests\Fixtures\Classes\BusinessRules\Requestors\Domain\SubDomain\DeleteFunctionalEntityRequestBuilder;
use OpenClassrooms\CodeGenerator\Tests\Fixtures\Classes\BusinessRules\UseCases\Domain\SubDomain\DeleteFunctionalEntity;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Security;
use Symfony\Component\HttpFoundation\JsonResponse;

class DeleteFunctionalEntityController extends AbstractApiController
{
    /**
     * @var DeleteFunctionalEntityRequestBuilder
     */
    private $deleteFunctionalEntityRequestBuilder;

    public function __construct(DeleteFunctionalEntityRequestBuilder $builder)
    {
        $this->deleteFunctionalEntityRequestBuilder = $builder;
    }

    /**
     * @Security("")
     */
    public function deleteAction(int $functionalEntityId): JsonResponse
    {
        try {
            $this->deleteFunctionalEntity($functionalEntityId);

            return $this->createDeletedResponse();
        } catch (FunctionalEntityNotFoundException $exception) {
            return $this->throwNotFoundException();
        }
    }

    private function deleteFunctionalEntity(int $functionalEntityId): void
    {
        $this->get(DeleteFunctionalEntity::class)->execute(
            $this->deleteFunctionalEntityRequestBuilder
                ->create()
                ->withFunctionalEntityId($functionalEntityId)
                ->build()
        );
    }
}
