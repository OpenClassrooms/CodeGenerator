<?php

declare(strict_types=1);

namespace OpenClassrooms\CodeGenerator\Tests\Doubles\Entities\Api\ViewModels\ViewModel;

use OpenClassrooms\CodeGenerator\Entities\Object\FileObject;

class ViewModelFileObjectStub1 extends FileObject
{
    const CLASS_NAME = 'OpenClassrooms\CodeGenerator\Tests\Fixtures\Classes\Api\ViewModels\Domain\SubDomain\FunctionalEntityViewModel';

    public function __construct()
    {
        $this->content = __DIR__ . '/../../../../../Fixtures/Classes/Api/ViewModels/Domain/SubDomain/FunctionalEntityViewModel.php';
        $this->className = self::CLASS_NAME;
        $this->fields = [
            new ViewModelFieldObjectStub2(),
            new ViewModelFieldObjectStub3(),
            new ViewModelFieldObjectStub4(),
            new ViewModelFieldObjectStub1(),
        ];
    }
}
