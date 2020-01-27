<?php

declare(strict_types=1);

namespace OpenClassrooms\CodeGenerator\Tests\Doubles\Entities\Api\ViewModels\ViewModelListItemStub;

use OpenClassrooms\CodeGenerator\Entities\Object\FileObject;

class ViewModelListItemStubFileObjectStub1 extends FileObject
{
    const CLASS_NAME = 'OpenClassrooms\CodeGenerator\Tests\Fixtures\Classes\Tests\Doubles\Api\ViewModels\Domain\SubDomain\FunctionalEntityViewModelListItemStub1';

    public function __construct()
    {
        $this->content = __DIR__ . '/../../../../../Fixtures/Classes/Tests/Doubles/Api/ViewModels/Domain/SubDomain/FunctionalEntityViewModelListItemStub1.php';
        $this->className = self::CLASS_NAME;
        $this->fields = [
            new ViewModelListItemStubFieldObjectStub2(),
            new ViewModelListItemStubFieldObjectStub3(),
            new ViewModelListItemStubFieldObjectStub4(),
            new ViewModelListItemStubFieldObjectStub1(),
        ];
    }
}
