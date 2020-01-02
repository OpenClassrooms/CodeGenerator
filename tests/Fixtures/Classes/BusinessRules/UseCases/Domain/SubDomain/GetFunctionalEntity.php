<?php

// Auto Generated by OpenClassrooms Code Generator

declare(strict_types=1);

namespace OpenClassrooms\CodeGenerator\Tests\Fixtures\Classes\BusinessRules\UseCases\Domain\SubDomain;

use OpenClassrooms\CodeGenerator\Tests\Fixtures\Classes\BusinessRules\Entities\Domain\SubDomain\FunctionalEntity;
use OpenClassrooms\CodeGenerator\Tests\Fixtures\Classes\BusinessRules\Gateways\Domain\SubDomain\FunctionalEntityGateway;
use OpenClassrooms\CodeGenerator\Tests\Fixtures\Classes\BusinessRules\Requestors\Domain\SubDomain\GetFunctionalEntityRequest;
use OpenClassrooms\CodeGenerator\Tests\Fixtures\Classes\BusinessRules\Responders\Domain\SubDomain\FunctionalEntityDetailResponse;
use OpenClassrooms\CodeGenerator\Tests\Fixtures\Classes\BusinessRules\Responders\Domain\SubDomain\FunctionalEntityDetailResponseAssembler;
use OpenClassrooms\UseCase\BusinessRules\Requestors\UseCase;
use OpenClassrooms\UseCase\BusinessRules\Requestors\UseCaseRequest;

class GetFunctionalEntity implements UseCase
{
    /**
     * @var FunctionalEntityGateway
     */
    private $gateway;

    /**
     * @var FunctionalEntityDetailResponseAssembler
     */
    private $responseAssembler;

    public function __construct(FunctionalEntityDetailResponseAssembler $assembler, FunctionalEntityGateway $gateway)
    {
        $this->gateway = $gateway;
        $this->responseAssembler = $assembler;
    }

    /**
     * @param GetFunctionalEntityRequest $useCaseRequest
     *
     * @throws \OpenClassrooms\CodeGenerator\Tests\Fixtures\Classes\BusinessRules\Gateways\Domain\SubDomain\Exceptions\FunctionalEntityNotFoundException
     */
    public function execute(UseCaseRequest $useCaseRequest): FunctionalEntityDetailResponse
    {
        $functionalEntity = $this->getFunctionalEntity($useCaseRequest->getFunctionalEntityId());

        return $this->buildResponse($functionalEntity);
    }

    /**
     * @throws \OpenClassrooms\CodeGenerator\Tests\Fixtures\Classes\BusinessRules\Gateways\Domain\SubDomain\Exceptions\FunctionalEntityNotFoundException
     */
    private function getFunctionalEntity(int $functionalEntityId): FunctionalEntity
    {
        return $this->gateway->findById($functionalEntityId);
    }

    private function buildResponse(FunctionalEntity $functionalEntity): FunctionalEntityDetailResponse
    {
        return $this->responseAssembler->create($functionalEntity);
    }
}
