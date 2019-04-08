<?php declare(strict_types=1);
// Auto Generated by OpenClassrooms Code Generator

namespace OpenClassrooms\CodeGenerator\Tests\Fixtures\Classes\BusinessRules\UseCases\Domain\SubDomain\DTO\Response;

use OpenClassrooms\CodeGenerator\Tests\Fixtures\Classes\BusinessRules\Entities\Domain\SubDomain\FunctionalEntity;
use OpenClassrooms\CodeGenerator\Tests\Fixtures\Classes\BusinessRules\Responders\Domain\SubDomain\FunctionalEntityDetailResponse;
use OpenClassrooms\CodeGenerator\Tests\Fixtures\Classes\BusinessRules\Responders\Domain\SubDomain\FunctionalEntityDetailResponseAssembler;

/**
 * @author authorStub <author.stub@example.com>
 */
class FunctionalEntityDetailResponseAssemblerImpl implements FunctionalEntityDetailResponseAssembler
{
    use FunctionalEntityResponseTrait;

    /**
     * {@inheritdoc}
     */
    public function create(FunctionalEntity $entity): FunctionalEntityDetailResponse
    {
        $response = new FunctionalEntityDetailResponseDTO();

        $this->hydrateCommonFields($entity, $response);
        $response->field4 = $entity->getField4();

        return $response;
    }
}
