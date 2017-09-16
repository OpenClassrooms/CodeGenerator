<?php

namespace OpenClassrooms\CodeGenerator\Tests\Doubles\tests\Doubles\OpenClassrooms\CodeGenerator\Tests\Doubles\src\BusinessRules\Responders\Domain\SubDomain;

use OpenClassrooms\CodeGenerator\Tests\Doubles\src\BusinessRules\UseCases\Domain\SubDomain\DTO\Response\FunctionalEntityDetailResponseDTO;
use OpenClassrooms\CodeGenerator\Tests\Doubles\tests\Doubles\OpenClassrooms\CodeGenerator\Tests\Doubles\src\BusinessRules\Entities\Domain\SubDomain\FunctionalEntityStub1;

/**
 * @author Romain Kuzniak <romain.kuzniak@openclassrooms.com>
 */
class FunctionalEntityDetailResponseStub1 extends FunctionalEntityDetailResponseDTO
{
    public $id = FunctionalEntityStub1::ID;

    public $field1 = FunctionalEntityStub1::FIELD1;

    public $field2 = FunctionalEntityStub1::FIELD2;

    public $field3 = FunctionalEntityStub1::FIELD3;

    public $field4 = FunctionalEntityStub1::FIELD4;

}
