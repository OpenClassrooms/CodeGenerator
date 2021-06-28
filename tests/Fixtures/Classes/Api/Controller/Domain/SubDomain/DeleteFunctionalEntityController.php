<?php

// Auto Generated by OpenClassrooms Code Generator

declare(strict_types=1);

namespace OpenClassrooms\CodeGenerator\Tests\Fixtures\Classes\Api\Controller\Domain\SubDomain;

use OC\ApiBundle\Framework\FrameworkBundle\Controller\AbstractApiController;
use OpenClassrooms\CodeGenerator\Tests\Fixtures\Classes\BusinessRules\Gateways\Domain\SubDomain\Exceptions\FunctionalEntityNotFoundException;
use OpenClassrooms\CodeGenerator\Tests\Fixtures\Classes\BusinessRules\Requestors\Domain\SubDomain\DeleteFunctionalEntityRequestBuilder;
use OpenClassrooms\CodeGenerator\Tests\Fixtures\Classes\BusinessRules\UseCases\Domain\SubDomain\DeleteFunctionalEntity;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Security;
use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Component\Routing\Annotation\Route;

class DeleteFunctionalEntityController extends AbstractApiController
{
    private DeleteFunctionalEntityRequestBuilder $deleteFunctionalEntityRequestBuilder;

    public function __construct(DeleteFunctionalEntityRequestBuilder $builder)
    {
        $this->deleteFunctionalEntityRequestBuilder = $builder;
    }

    /**
     * @Route("/functional-entities/{functionalEntityId}", name="openclassrooms_codegenerator_tests_fixtures_classes_api_sub_domain_functional_entity_delete", methods={"DELETE"}, requirements={"functionalEntityId"="^\d{1,9}$"})
     *
     * @Security("")
     */
    public function deleteAction(int $functionalEntityId): JsonResponse
    {
        try {
            $this->deleteFunctionalEntity($functionalEntityId);

            return $this->createDeletedResponse();
        } catch (FunctionalEntityNotFoundException $exception) {
            throw $this->createNotFoundException();
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
