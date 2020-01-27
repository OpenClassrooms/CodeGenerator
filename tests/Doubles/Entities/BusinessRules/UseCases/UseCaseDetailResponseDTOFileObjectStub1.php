<?php

declare(strict_types=1);

namespace OpenClassrooms\CodeGenerator\Tests\Doubles\Entities\BusinessRules\UseCases;

use OpenClassrooms\CodeGenerator\Entities\Object\FileObject;

class UseCaseDetailResponseDTOFileObjectStub1 extends FileObject
{
    const CLASS_NAME = 'OpenClassrooms\CodeGenerator\Tests\Fixtures\Classes\BusinessRules\UseCases\Domain\SubDomain\DTO\Response\FunctionalEntityDetailResponseDTO';

    public function __construct()
    {
        $this->content = __DIR__ . '/../../../../Fixtures/Classes/BusinessRules/UseCases/Domain/SubDomain/DTO/Response/FunctionalEntityDetailResponseDTO.php';
        $this->className = self::CLASS_NAME;
    }
}
