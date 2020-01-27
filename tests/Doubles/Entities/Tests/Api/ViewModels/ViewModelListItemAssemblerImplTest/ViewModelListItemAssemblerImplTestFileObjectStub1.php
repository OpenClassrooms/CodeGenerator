<?php

declare(strict_types=1);

namespace OpenClassrooms\CodeGenerator\Tests\Doubles\Entities\Tests\Api\ViewModels\ViewModelListItemAssemblerImplTest;

use OpenClassrooms\CodeGenerator\Entities\Object\FileObject;

class ViewModelListItemAssemblerImplTestFileObjectStub1 extends FileObject
{
    const CLASS_NAME = 'OpenClassrooms\CodeGenerator\Tests\Fixtures\Classes\Tests\Api\ViewModels\Domain\SubDomain\Impl\FunctionalEntityViewModelListItemAssemblerImplTest';

    public function __construct()
    {
        $this->content = __DIR__ . '/../../../../../../Fixtures/Classes/Tests/Api/ViewModels/Domain/SubDomain/Impl/FunctionalEntityViewModelListItemAssemblerImplTest.php';
        $this->className = self::CLASS_NAME;
    }
}
