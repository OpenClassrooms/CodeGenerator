<?php

namespace OpenClassrooms\CodeGenerator\Tests\Doubles\src\BusinessRules\UseCases\Domain\SubDomain\DTO\Response;

use OpenClassrooms\CodeGenerator\Tests\Doubles\src\BusinessRules\Entities\Domain\SubDomain\Entity;
use OpenClassrooms\CodeGenerator\Tests\Doubles\src\BusinessRules\Responders\Domain\SubDomain\EntityResponse;

/**
 * @author Romain Kuzniak <romain.kuzniak@openclassrooms.com>
 */
trait EntityResponseAssemblerTrait
{
    /**
     * @param \OpenClassrooms\CodeGenerator\Tests\Doubles\src\BusinessRules\UseCases\Domain\SubDomain\DTO\Response\EntityResponseDTO|EntityResponse $response
     */
    protected function hydrateCommonFields(EntityResponse $response, Entity $entity)
    {
        $response->id = $entity->getId();
        $response->field1 = $entity->getField1();
        $response->field2 = $entity->getField2();
        $response->field3 = $entity->isField3();
    }
}
