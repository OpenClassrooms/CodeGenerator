<?php declare(strict_types=1);

namespace OpenClassrooms\CodeGenerator\Tests\Fixtures\Classes\BusinessRules\UseCases\Domain\SubDomain\DTO\Response;

use OpenClassrooms\CodeGenerator\Tests\Fixtures\Classes\BusinessRules\Responders\Domain\SubDomain\FunctionalEntityDetailResponse;

/**
 * @author Samuel Gomis <gomis.samuel@external.openclassrooms.com>
 */
class FunctionalEntityDetailResponseDTO extends FunctionalEntityResponseDTO implements FunctionalEntityDetailResponse
{
    /**
     * @var \DateTimeImmutable
     */
    public $field4;

    public function getField4(): ?\DateTimeImmutable
    {
        return $this->field4;
    }
}
