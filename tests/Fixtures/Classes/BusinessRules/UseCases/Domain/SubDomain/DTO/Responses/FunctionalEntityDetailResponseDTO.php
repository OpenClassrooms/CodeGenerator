<?php declare(strict_types=1);

namespace OpenClassrooms\CodeGenerator\Tests\Fixtures\Classes\BusinessRules\UseCases\Domain\SubDomain\DTO\Responses;

use OpenClassrooms\CodeGenerator\Tests\Fixtures\Classes\BusinessRules\Responders\Domain\SubDomain\FunctionalEntityDetailResponse;

/**
 * @author Samuel Gomis <gomis.samuel@external.openclassrooms.com>
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
