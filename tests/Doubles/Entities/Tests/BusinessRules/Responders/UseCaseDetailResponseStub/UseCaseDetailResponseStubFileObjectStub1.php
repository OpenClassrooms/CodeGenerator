<?php

declare(strict_types=1);

namespace OpenClassrooms\CodeGenerator\Tests\Doubles\Entities\Tests\BusinessRules\Responders\UseCaseDetailResponseStub;

use OpenClassrooms\CodeGenerator\Entities\Object\FileObject;

class UseCaseDetailResponseStubFileObjectStub1 extends FileObject
{
    public const CLASS_NAME = 'OpenClassrooms\CodeGenerator\Tests\Fixtures\Classes\Tests\Doubles\BusinessRules\Responders\Domain\SubDomain\FunctionalEntityDetailResponseStub1';

    public function __construct()
    {
        $this->content = __DIR__ . '/../../../../../../Fixtures/Classes/Tests/Doubles/BusinessRules/Responders/Domain/SubDomain/FunctionalEntityDetailResponseStub1.php';
        $this->className = self::CLASS_NAME;
        $this->fields = [
            new UseCaseDetailResponseStubFieldObjectStub1(),
            new UseCaseDetailResponseStubFieldObjectStub2(),
            new UseCaseDetailResponseStubFieldObjectStub3(),
            new UseCaseDetailResponseStubFieldObjectStub4(),
            new UseCaseDetailResponseStubFieldObjectStub5(),
            new UseCaseDetailResponseStubFieldObjectStub6(),
        ];
    }
}
