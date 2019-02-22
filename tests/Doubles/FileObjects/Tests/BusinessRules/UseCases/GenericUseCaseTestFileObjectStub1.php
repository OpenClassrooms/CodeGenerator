<?php declare(strict_types=1);

namespace OpenClassrooms\CodeGenerator\Tests\Doubles\FileObjects\Tests\BusinessRules\UseCases;

use OpenClassrooms\CodeGenerator\FileObjects\FileObject;

/**
 * @author Samuel Gomis <gomis.samuel@external.openclassrooms.com>
 */
class GenericUseCaseTestFileObjectStub1 extends FileObject
{
    const CLASS_NAME = 'OpenClassrooms\CodeGenerator\Tests\Fixtures\Classes\Tests\BusinessRules\UseCases\Domain\SubDomain\GenericUseCaseTest';

    public function __construct()
    {
        $this->content = __DIR__ . '/../../../../../Fixtures/Classes/tests/BusinessRules/UseCases/Domain/SubDomain/GenericUseCaseTest.php';
        $this->className = self::CLASS_NAME;
        $this->fields = [];
    }
}
