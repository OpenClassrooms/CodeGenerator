<?php

namespace OpenClassrooms\CodeGenerator\Tests\Doubles\src\BusinessRules\UseCases\Domain\SubDomain\DTO\Response;

use OpenClassrooms\CodeGenerator\Tests\Doubles\src\BusinessRules\Entities\Domain\SubDomain\Entity;
use OpenClassrooms\CodeGenerator\Tests\Doubles\src\BusinessRules\Responders\Domain\SubDomain\EntityDetailResponse;
use OpenClassrooms\CodeGenerator\Tests\Doubles\src\BusinessRules\Responders\Domain\SubDomain\EntityDetailResponseAssembler;

/**
 * @author Romain Kuzniak <romain.kuzniak@openclassrooms.com>
 */
class EntityDetailResponseAssemblerImpl implements EntityDetailResponseAssembler
{
    use EntityResponseAssemblerTrait;

    public function create(Entity $entity): EntityDetailResponse
    {
        $response = new EntityDetailResponseDTO();
        $this->hydrateCommonFields($response, $entity);
        $response->field4 = $entity->getField4();

        return $response;
    }
}
