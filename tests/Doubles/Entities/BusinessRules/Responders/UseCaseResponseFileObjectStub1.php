<?php declare(strict_types=1);

namespace OpenClassrooms\CodeGenerator\Tests\Doubles\Entities\BusinessRules\Responders;

use OpenClassrooms\CodeGenerator\Entities\FileObject;

/**
 * @author Samuel Gomis <samuel.gomis@external.openclassrooms.com>
 */
class UseCaseResponseFileObjectStub1 extends FileObject
{
    const CLASS_NAME = 'OpenClassrooms\CodeGenerator\Tests\Fixtures\Classes\BusinessRules\Responders\Domain\SubDomain\FunctionalEntityResponse';

    public function __construct()
    {
        $this->content = __DIR__ . '/../../../../Fixtures/Classes/BusinessRules/Responders/Domain/SubDomain/FunctionalEntityResponse.php';
        $this->className = self::CLASS_NAME;
        $this->fields = [];
    }
}