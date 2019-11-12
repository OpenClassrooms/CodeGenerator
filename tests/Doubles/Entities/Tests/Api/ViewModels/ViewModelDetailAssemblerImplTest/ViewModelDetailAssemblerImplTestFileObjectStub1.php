<?php declare(strict_types=1);

namespace OpenClassrooms\CodeGenerator\Tests\Doubles\Entities\Tests\Api\ViewModels\ViewModelDetailAssemblerImplTest;

use OpenClassrooms\CodeGenerator\Entities\FileObject;

/**
 * @author Samuel Gomis <samuel.gomis@external.openclassrooms.com>
 */
class ViewModelDetailAssemblerImplTestFileObjectStub1 extends FileObject
{
    const CLASS_NAME = 'OpenClassrooms\CodeGenerator\Tests\Fixtures\Classes\Tests\Api\ViewModels\Domain\SubDomain\Impl\FunctionalEntityViewModelDetailAssemblerImplTest';

    public function __construct()
    {
        $this->content = __DIR__ . '/../../../../../../Fixtures/Classes/Tests/Api/ViewModels/Domain/SubDomain/Impl/FunctionalEntityViewModelDetailAssemblerImplTest.php';
        $this->className = self::CLASS_NAME;
    }
}
