<?php

namespace OpenClassrooms\CodeGenerator\Tests\Doubles\src\BusinessRules\UseCases\Domain\SubDomain\DTO\Response;

use OpenClassrooms\CodeGenerator\Tests\Doubles\src\BusinessRules\Entities\Domain\SubDomain\FunctionalEntity;
use OpenClassrooms\CodeGenerator\Tests\Doubles\src\BusinessRules\Responders\Domain\SubDomain\FunctionalEntityDetailResponse;
use OpenClassrooms\CodeGenerator\Tests\Doubles\src\BusinessRules\Responders\Domain\SubDomain\FunctionalEntityDetailResponseAssembler;

/**
 * @author Romain Kuzniak <romain.kuzniak@openclassrooms.com>
 */
class FunctionalEntityDetailResponseAssemblerImpl implements FunctionalEntityDetailResponseAssembler
{
    use FunctionalEntityResponseAssemblerTrait;

    public function create(FunctionalEntity $functionalEntity): FunctionalEntityDetailResponse
    {
        $response = new FunctionalEntityDetailResponseDTO();
        $this->hydrateCommonFields($response, $functionalEntity);
        $response->field4 = $functionalEntity->getField4();

        return $response;
    }
}
