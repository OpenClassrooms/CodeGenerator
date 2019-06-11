<?php declare(strict_types=1);

namespace OpenClassrooms\CodeGenerator\Tests\Doubles\Entities\Tests\BusinessRules\UseCases;

use OpenClassrooms\CodeGenerator\Entities\FileObject;

/**
 * @author Samuel Gomis <samuel.gomis@external.openclassrooms.com>
 */
class GetEntitiesUseCaseTestFileObjectStub1 extends FileObject
{
    const CLASS_NAME = 'OpenClassrooms\CodeGenerator\Tests\Fixtures\Classes\Tests\BusinessRules\UseCases\Domain\SubDomain\GetFunctionalEntitiesTest';

    public function __construct()
    {
        $this->content = __DIR__ . '/../../../../../Fixtures/Classes/Tests/BusinessRules/UseCases/Domain/SubDomain/GetFunctionalEntitiesTest.php';
        $this->className = self::CLASS_NAME;

    }
}
