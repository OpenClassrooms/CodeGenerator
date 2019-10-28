<?php declare(strict_types=1);

namespace OpenClassrooms\CodeGenerator\Tests\Fixtures\Classes\BusinessRules\UseCases\Domain\SubDomain;

use OpenClassrooms\CodeGenerator\Tests\Fixtures\Classes\BusinessRules\Entities\Domain\SubDomain\FunctionalEntity;
use OpenClassrooms\CodeGenerator\Tests\Fixtures\Classes\BusinessRules\Entities\Domain\SubDomain\FunctionalEntityFactory;
use OpenClassrooms\CodeGenerator\Tests\Fixtures\Classes\BusinessRules\Gateways\Domain\SubDomain\FunctionalEntityGateway;
use OpenClassrooms\CodeGenerator\Tests\Fixtures\Classes\BusinessRules\Requestors\Domain\SubDomain\CreateFunctionalEntityRequest;
use OpenClassrooms\CodeGenerator\Tests\Fixtures\Classes\BusinessRules\Responders\Domain\SubDomain\FunctionalEntityDetailResponse;
use OpenClassrooms\CodeGenerator\Tests\Fixtures\Classes\BusinessRules\Responders\Domain\SubDomain\FunctionalEntityDetailResponseAssembler;
use OpenClassrooms\UseCase\Application\Annotations\Transaction;
use OpenClassrooms\UseCase\BusinessRules\Requestors\UseCase;
use OpenClassrooms\UseCase\BusinessRules\Requestors\UseCaseRequest;

class CreateFunctionalEntity implements UseCase
{
    /**
     * @var FunctionalEntityFactory
     */
    private $functionalEntityFactory;

    /**
     * @var FunctionalEntityGateway
     */
    private $functionalEntityGateway;

    /**
     * @var FunctionalEntityDetailResponseAssembler
     */
    private $functionalEntityResponseAssembler;

    public function __construct(
        FunctionalEntityDetailResponseAssembler $functionalEntityResponseAssembler,
        FunctionalEntityFactory $functionalEntityFactory,
        FunctionalEntityGateway $functionalEntityGateway
    ) {
        $this->functionalEntityResponseAssembler = $functionalEntityResponseAssembler;
        $this->functionalEntityFactory = $functionalEntityFactory;
        $this->functionalEntityGateway = $functionalEntityGateway;
    }

    /**
     * @Transaction
     *
     * @param CreateFunctionalEntityRequest $useCaseRequest
     */
    public function execute(UseCaseRequest $useCaseRequest): FunctionalEntityDetailResponse
    {
        $functionalEntity = $this->buildFunctionalEntity();
        $this->save($functionalEntity);

        return $this->createResponse($functionalEntity);
    }

    private function buildFunctionalEntity(): FunctionalEntity
    {
        return $this->functionalEntityFactory->create();
    }

    private function save(FunctionalEntity $functionalEntity): void
    {
        $this->functionalEntityGateway->insert($functionalEntity);
    }

    private function createResponse(FunctionalEntity $functionalEntity): FunctionalEntityDetailResponse
    {
        return $this->functionalEntityResponseAssembler->create($functionalEntity);
    }
}
