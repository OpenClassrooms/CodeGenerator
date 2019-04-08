<?php declare(strict_types=1);

namespace OpenClassrooms\CodeGenerator\Tests\Doubles\Entities\Tests\BusinessRules\Responders\UseCaseDetailResponseStub;

use OpenClassrooms\CodeGenerator\Entities\FileObject;

/**
 * @author Samuel Gomis <samuel.gomis@external.openclassrooms.com>
 */
class UseCaseDetailResponseStubFileObjectStub1 extends FileObject
{
    const CLASS_NAME = 'OpenClassrooms\CodeGenerator\Tests\Fixtures\Classes\tests\Doubles\BusinessRules\Responders\Domain\SubDomain\FunctionalEntityDetailResponseStub1';

    public function __construct()
    {
        $this->content = __DIR__ . '/../../../../../../Fixtures/Classes/tests/Doubles/BusinessRules/Responders/Domain/SubDomain/FunctionalEntityDetailResponseStub1.php';
        $this->className = self::CLASS_NAME;
        $this->fields = [
            new UseCaseDetailResponseStubFieldObjectStub1(),
            new UseCaseDetailResponseStubFieldObjectStub2(),
            new UseCaseDetailResponseStubFieldObjectStub3(),
            new UseCaseDetailResponseStubFieldObjectStub4(),
            new UseCaseDetailResponseStubFieldObjectStub5(),
        ];
    }
}
