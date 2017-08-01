<?php

namespace OpenClassrooms\CodeGenerator\Tests\Doubles\src\BusinessRules\UseCases\Domain\SubDomain\DTO\Response;

use OpenClassrooms\CodeGenerator\Tests\Doubles\src\BusinessRules\Responders\Domain\SubDomain\EntityDetailResponse;

/**
 * @author Romain Kuzniak <romain.kuzniak@openclassrooms.com>
 */
class EntityDetailResponseDTO extends EntityResponseDTO implements EntityDetailResponse
{
    /**
     * @var \DateTime
     */
    public $field4;

    public function getField4()
    {
        return $this->field3;
    }
}
