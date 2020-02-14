<?php

// Auto Generated by OpenClassrooms Code Generator

declare(strict_types=1);

namespace OpenClassrooms\CodeGenerator\Tests\Fixtures\Classes\Api\Controller;

use OC\ApiBundle\Framework\FrameworkBundle\Controller\AbstractApiController;
use OpenClassrooms\CodeGenerator\Tests\Fixtures\Classes\Api\ViewModels\Domain\SubDomain\FunctionalEntityViewModel;
use OpenClassrooms\CodeGenerator\Tests\Fixtures\Classes\Api\ViewModels\Domain\SubDomain\FunctionalEntityViewModelDetailAssembler;
use OpenClassrooms\CodeGenerator\Tests\Fixtures\Classes\BusinessRules\Gateways\Domain\SubDomain\Exceptions\FunctionalEntityNotFoundException;
use OpenClassrooms\CodeGenerator\Tests\Fixtures\Classes\BusinessRules\Requestors\Domain\SubDomain\GetFunctionalEntityRequestBuilder;
use OpenClassrooms\CodeGenerator\Tests\Fixtures\Classes\BusinessRules\Responders\Domain\SubDomain\FunctionalEntityDetailResponse;
use OpenClassrooms\CodeGenerator\Tests\Fixtures\Classes\BusinessRules\Responders\Domain\SubDomain\FunctionalEntityResponse;
use OpenClassrooms\CodeGenerator\Tests\Fixtures\Classes\BusinessRules\UseCases\Domain\SubDomain\GetFunctionalEntity;
use Symfony\Component\HttpFoundation\JsonResponse;

class GetFunctionalEntityController extends AbstractApiController
{
    /**
     * @var FunctionalEntityViewModelDetailAssembler
     */
    private $functionalEntityViewModelDetailAssembler;

    /**
     * @var GetFunctionalEntityRequestBuilder
     */
    private $getFunctionalEntityRequestBuilder;

    public function __construct(
        FunctionalEntityViewModelDetailAssembler $assembler,
        GetFunctionalEntityRequestBuilder $builder
    ) {
        $this->functionalEntityViewModelDetailAssembler = $assembler;
        $this->getFunctionalEntityRequestBuilder = $builder;
    }

    /**
     * @Security("")
     * @throws \HttpNotFoundException
     */
    public function getAction(int $userId): JsonResponse
    {
        try {
            $functionalEntity = $this->getFunctionalEntity($userId);
            $vm = $this->buildViewModel($functionalEntity);

            return $this->createJsonResponse($vm);
        } catch (FunctionalEntityNotFoundException $e) {
            $this->throwNotFoundException();
        }
    }

    /**
     * @throws FunctionalEntityNotFoundException
     */
    private function getFunctionalEntity(int $functionalEntityId): FunctionalEntityResponse
    {
        return $this->get(GetFunctionalEntity::class)->execute(
            $this->getFunctionalEntityRequestBuilder
                ->create()
                ->withFunctionalEntityId($functionalEntityId)
                ->build()
        );
    }

    protected function buildViewModel(FunctionalEntityDetailResponse $functionalEntity): FunctionalEntityViewModel
    {
        return $this->functionalEntityViewModelDetailAssembler->create($functionalEntity);
    }
}
