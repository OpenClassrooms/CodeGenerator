<?php

// Auto Generated by OpenClassrooms Code Generator

declare(strict_types=1);

namespace OpenClassrooms\CodeGenerator\Tests\Fixtures\Classes\BusinessRules\UseCases\Domain\SubDomain\DTO\Response;

use OpenClassrooms\CodeGenerator\Tests\Fixtures\Classes\BusinessRules\Entities\Domain\SubDomain\FunctionalEntity;
use OpenClassrooms\CodeGenerator\Tests\Fixtures\Classes\BusinessRules\Responders\Domain\SubDomain\FunctionalEntityDetailResponse;
use OpenClassrooms\CodeGenerator\Tests\Fixtures\Classes\BusinessRules\Responders\Domain\SubDomain\FunctionalEntityDetailResponseAssembler;

class FunctionalEntityDetailResponseAssemblerImpl implements FunctionalEntityDetailResponseAssembler
{
    use FunctionalEntityResponseAssemblerTrait;

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
