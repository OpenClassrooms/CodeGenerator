<?php declare(strict_types=1);
// Auto Generated by OpenClassrooms Code Generator

namespace OpenClassrooms\CodeGenerator\Tests\Fixtures\Classes\BusinessRules\UseCases\Domain\SubDomain\DTO\Response;

use OpenClassrooms\CodeGenerator\Tests\Fixtures\Classes\BusinessRules\Responders\Domain\SubDomain\FunctionalEntityDetailResponse;

class FunctionalEntityDetailResponseDTO implements FunctionalEntityDetailResponse
{
    use FunctionalEntityResponseCommonFieldTrait;

    /**
     * @var \DateTimeImmutable
     */
    public $field4;

    public function getField4(): ?\DateTimeImmutable
    {
        return $this->field4;
    }
}
