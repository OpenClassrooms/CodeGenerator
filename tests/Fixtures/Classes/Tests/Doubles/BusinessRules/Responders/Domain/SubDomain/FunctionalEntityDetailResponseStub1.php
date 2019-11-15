<?php declare(strict_types=1);
// Auto Generated by OpenClassrooms Code Generator

namespace OpenClassrooms\CodeGenerator\Tests\Fixtures\Classes\Tests\Doubles\BusinessRules\Responders\Domain\SubDomain;

use OpenClassrooms\CodeGenerator\Tests\Fixtures\Classes\BusinessRules\UseCases\Domain\SubDomain\DTO\Response\FunctionalEntityDetailResponseDTO;
use OpenClassrooms\CodeGenerator\Tests\Fixtures\Classes\Tests\Doubles\BusinessRules\Entities\Domain\SubDomain\FunctionalEntityStub1;

class FunctionalEntityDetailResponseStub1 extends FunctionalEntityDetailResponseDTO
{
    public const FIELD_1 = FunctionalEntityStub1::FIELD_1;

    public const FIELD_2 = FunctionalEntityStub1::FIELD_2;

    public const FIELD_3 = FunctionalEntityStub1::FIELD_3;

    public const FIELD_4 = FunctionalEntityStub1::FIELD_4;

    public const ID = FunctionalEntityStub1::ID;

    public const UPDATED_AT = FunctionalEntityStub1::UPDATED_AT;

    public $field1 = self::FIELD_1;

    public $field2 = self::FIELD_2;

    public $field3 = self::FIELD_3;

    public $field4 = self::FIELD_4;

    public $id = self::ID;

    public $updatedAt = self::UPDATED_AT;

    public function __construct()
    {
        $this->field4 = new \DateTimeImmutable(self::FIELD_4);
        $this->updatedAt = new \DateTimeImmutable(self::UPDATED_AT);
    }
}
