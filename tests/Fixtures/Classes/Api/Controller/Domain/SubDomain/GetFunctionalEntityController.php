<?php

// Auto Generated by OpenClassrooms Code Generator

declare(strict_types=1);

namespace OpenClassrooms\CodeGenerator\Tests\Fixtures\Classes\Api\Controller\Domain\SubDomain;

use OC\ApiBundle\Framework\FrameworkBundle\Controller\AbstractApiController;
use OpenClassrooms\CodeGenerator\Tests\Fixtures\Classes\Api\ViewModels\Domain\SubDomain\FunctionalEntityViewModel;
use OpenClassrooms\CodeGenerator\Tests\Fixtures\Classes\Api\ViewModels\Domain\SubDomain\FunctionalEntityViewModelDetailAssembler;
use OpenClassrooms\CodeGenerator\Tests\Fixtures\Classes\BusinessRules\Gateways\Domain\SubDomain\Exceptions\FunctionalEntityNotFoundException;
use OpenClassrooms\CodeGenerator\Tests\Fixtures\Classes\BusinessRules\Responders\Domain\SubDomain\FunctionalEntityDetailResponse;
use OpenClassrooms\CodeGenerator\Tests\Fixtures\Classes\BusinessRules\UseCases\Domain\SubDomain\GetFunctionalEntity;
use OpenClassrooms\CodeGenerator\Tests\Fixtures\Classes\BusinessRules\UseCases\Domain\SubDomain\Request\GetFunctionalEntityRequest;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Security;
use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Component\HttpKernel\Exception\NotFoundHttpException;
use Symfony\Component\Routing\Annotation\Route;

class GetFunctionalEntityController extends AbstractApiController
{
    private FunctionalEntityViewModelDetailAssembler $functionalEntityViewModelDetailAssembler;

    public function __construct(
        FunctionalEntityViewModelDetailAssembler $assembler
    ) {
        $this->functionalEntityViewModelDetailAssembler = $assembler;
    }

    /**
     * @Route("/functional-entities/{functionalEntityId}", name="openclassrooms_codegenerator_tests_fixtures_classes_api_sub_domain_functional_entity_get", methods={"GET"}, requirements={"functionalEntityId"="^\d{1,9}$"})
     *
     * @Security("")
     * @throws NotFoundHttpException
     */
    public function getAction(int $functionalEntity): JsonResponse
    {
        try {
            $functionalEntity = $this->getFunctionalEntity($functionalEntity);
            $vm = $this->buildViewModel($functionalEntity);

            return $this->createJsonResponse($vm);
        } catch (FunctionalEntityNotFoundException $e) {
            throw $this->createNotFoundException();
        }
    }

    /**
     * @throws FunctionalEntityNotFoundException
     */
    private function getFunctionalEntity(int $functionalEntityId): FunctionalEntityDetailResponse
    {
        return $this->get(GetFunctionalEntity::class)->execute(
            GetFunctionalEntityRequest::create($functionalEntityId)
        );
    }

    protected function buildViewModel(FunctionalEntityDetailResponse $functionalEntity): FunctionalEntityViewModel
    {
        return $this->functionalEntityViewModelDetailAssembler->create($functionalEntity);
    }
}
