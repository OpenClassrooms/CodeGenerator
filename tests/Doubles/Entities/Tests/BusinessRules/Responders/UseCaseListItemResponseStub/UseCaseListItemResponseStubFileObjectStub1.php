<?php declare(strict_types=1);

namespace OpenClassrooms\CodeGenerator\Tests\Doubles\Entities\Tests\BusinessRules\Responders\UseCaseListItemResponseStub;

use OpenClassrooms\CodeGenerator\Entities\FileObject;

/**
 * @author Samuel Gomis <samuel.gomis@external.openclassrooms.com>
 */
class UseCaseListItemResponseStubFileObjectStub1 extends FileObject
{
    const CLASS_NAME = 'OpenClassrooms\CodeGenerator\Tests\Fixtures\Classes\Tests\Doubles\BusinessRules\Responders\Domain\SubDomain\FunctionalEntityListItemResponseStub1';

    public function __construct()
    {
        $this->content = __DIR__ . '/../../../../../../Fixtures/Classes/Tests/Doubles/BusinessRules/Responders/Domain/SubDomain/FunctionalEntityListItemResponseStub1.php';
        $this->className = self::CLASS_NAME;
        $this->fields = [
            new UseCaseListItemResponseStubFieldObjectStub1(),
            new UseCaseListItemResponseStubFieldObjectStub2(),
            new UseCaseListItemResponseStubFieldObjectStub3(),
            new UseCaseListItemResponseStubFieldObjectStub4(),
        ];
    }
}
