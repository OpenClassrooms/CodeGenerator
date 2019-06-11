<?php declare(strict_types=1);

namespace OpenClassrooms\CodeGenerator\Tests\Doubles\Entities\Tests\Doubles\BusinessRules\Gateways;

use OpenClassrooms\CodeGenerator\Entities\FileObject;

/**
 * @author arnaud lefevre <arnaud.lefevre@openclassrooms.com>
 */
class InMemoryEntityGatewayFileObjectStub1 extends FileObject
{
    const CLASS_NAME = 'OpenClassrooms\CodeGenerator\Tests\Fixtures\Classes\Tests\Doubles\BusinessRules\Gateways\Domain\SubDomain\InMemoryFunctionalEntityGateway';

    public function __construct()
    {
        $this->content = __DIR__ . '/../../../../../../Fixtures/Classes/Tests/Doubles/BusinessRules/Gateways/Domain/SubDomain/InMemoryFunctionalEntityGateway.php';
        $this->className = self::CLASS_NAME;

    }
}
