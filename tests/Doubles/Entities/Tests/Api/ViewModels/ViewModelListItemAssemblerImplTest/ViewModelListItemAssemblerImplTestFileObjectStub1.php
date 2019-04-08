<?php declare(strict_types=1);

namespace OpenClassrooms\CodeGenerator\Tests\Doubles\Entities\Tests\Api\ViewModels\ViewModelListItemAssemblerImplTest;

use OpenClassrooms\CodeGenerator\Entities\FileObject;

/**
 * @author Samuel Gomis <samuel.gomis@external.openclassrooms.com>
 */
class ViewModelListItemAssemblerImplTestFileObjectStub1 extends FileObject
{
    const CLASS_NAME = 'OpenClassrooms\CodeGenerator\Tests\Fixtures\Classes\Tests\Api\ViewModels\Domain\SubDomain\Impl\FunctionalEntityListItemAssemblerImplTest';

    public function __construct()
    {
        $this->content = __DIR__ . '/../../../../../../Fixtures/Classes/tests/Api/ViewModels/Domain/SubDomain/Impl/FunctionalEntityListItemAssemblerImplTest.php';
        $this->className = self::CLASS_NAME;
    }
}
