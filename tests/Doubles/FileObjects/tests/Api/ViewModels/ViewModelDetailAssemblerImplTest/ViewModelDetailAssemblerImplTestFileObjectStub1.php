<?php declare(strict_types=1);

namespace OpenClassrooms\CodeGenerator\Tests\Doubles\FileObjects\tests\Api\ViewModels\ViewModelDetailAssemblerImplTest;

use OpenClassrooms\CodeGenerator\FileObjects\FileObject;

/**
 * @author Samuel Gomis <gomis.samuel@external.openclassrooms.com>
 */
class ViewModelDetailAssemblerImplTestFileObjectStub1 extends FileObject
{
    const CLASS_NAME = 'OpenClassrooms\CodeGenerator\Tests\Fixtures\Classes\tests\Api\ViewModels\Domain\SubDomain\Impl\FunctionalEntityDetailAssemblerImplTest';

    public function __construct()
    {
        $this->content = __DIR__ . '/../../../../../../Fixtures/Classes/tests/Api/ViewModels/Domain/SubDomain/Impl/FunctionalEntityDetailAssemblerImplTest.php';
        $this->className = self::CLASS_NAME;
    }
}
