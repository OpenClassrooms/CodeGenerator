<?php declare(strict_types=1);

namespace OpenClassrooms\CodeGenerator\Tests\Fixtures\Classes\BusinessRules\UseCases\Domain\SubDomain;

use OpenClassrooms\CodeGenerator\Tests\Fixtures\Classes\BusinessRules\Entities\Domain\SubDomain\FunctionalEntity;
use OpenClassrooms\CodeGenerator\Tests\Fixtures\Classes\BusinessRules\Gateways\Domain\SubDomain\FunctionalEntityGateway;
use OpenClassrooms\CodeGenerator\Tests\Fixtures\Classes\BusinessRules\Requestors\Domain\SubDomain\DeleteFunctionalEntityRequest;
use OpenClassrooms\UseCase\BusinessRules\Requestors\UseCaseRequest;

class DeleteFunctionalEntity
{
    /**
     * @var FunctionalEntityGateway
     */
    private $functionalEntityGateway;

    public function __construct(FunctionalEntityGateway $gateway)
    {
        $this->functionalEntityGateway = $gateway;
    }

    private function delete(FunctionalEntity $functionalEntity): void
    {
        $this->functionalEntityGateway->delete($functionalEntity);
    }

    /**
     * @Transaction
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

    private function getFunctionalEntity(int $functionalEntityId): FunctionalEntity
    {
        return $this->functionalEntityGateway->findById($functionalEntityId);
    }
}