<?php

// Auto Generated by OpenClassrooms Code Generator

declare(strict_types=1);

namespace OpenClassrooms\CodeGenerator\Tests\Fixtures\Classes\BusinessRules\UseCases\Domain\SubDomain;

use OpenClassrooms\CodeGenerator\Tests\Fixtures\Classes\BusinessRules\Entities\Domain\SubDomain\FunctionalEntity;
use OpenClassrooms\CodeGenerator\Tests\Fixtures\Classes\BusinessRules\Gateways\Domain\SubDomain\FunctionalEntityGateway;
use OpenClassrooms\CodeGenerator\Tests\Fixtures\Classes\BusinessRules\Requestors\Domain\SubDomain\DeleteFunctionalEntityRequest;
use OpenClassrooms\UseCase\Application\Annotations\Security;
use OpenClassrooms\UseCase\Application\Annotations\Transaction;
use OpenClassrooms\UseCase\BusinessRules\Requestors\UseCase;
use OpenClassrooms\UseCase\BusinessRules\Requestors\UseCaseRequest;

class DeleteFunctionalEntity implements UseCase
{
    private FunctionalEntityGateway $functionalEntityGateway;

    public function __construct(FunctionalEntityGateway $functionalEntityGateway)
    {
        $this->functionalEntityGateway = $functionalEntityGateway;
    }

    /**
     * @Transaction
     * @Security(roles="")
     *
     * @param DeleteFunctionalEntityRequest $useCaseRequest
     *
     * @throws \OpenClassrooms\CodeGenerator\Tests\Fixtures\Classes\BusinessRules\Gateways\Domain\SubDomain\Exceptions\FunctionalEntityNotFoundException
     */
    public function execute(UseCaseRequest $useCaseRequest): void
    {
        $functionalEntity = $this->getFunctionalEntity($useCaseRequest->getFunctionalEntityId());
        $this->delete($functionalEntity);
    }

    /**
     * @throws \OpenClassrooms\CodeGenerator\Tests\Fixtures\Classes\BusinessRules\Gateways\Domain\SubDomain\Exceptions\FunctionalEntityNotFoundException
     */
    private function getFunctionalEntity(int $functionalEntityId): FunctionalEntity
    {
        return $this->functionalEntityGateway->findById($functionalEntityId);
    }

    private function delete(FunctionalEntity $functionalEntity): void
    {
        $this->functionalEntityGateway->delete($functionalEntity);
    }
}
