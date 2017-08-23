<?php

namespace OpenClassrooms\CodeGenerator\Tests\Doubles\src\BusinessRules\UseCases\Domain\SubDomain\DTO\Response;

use OpenClassrooms\CodeGenerator\Tests\Doubles\src\BusinessRules\Responders\Domain\SubDomain\FunctionalEntityDetailResponse;

/**
 * @author Romain Kuzniak <romain.kuzniak@openclassrooms.com>
 */
class FunctionalEntityDetailResponseDTO extends FunctionalEntityResponseDTO implements FunctionalEntityDetailResponse
{
    /**
     * @var \DateTime
     */
    public $field4;

    public function getField4()
    {
        return $this->field4;
    }
}
