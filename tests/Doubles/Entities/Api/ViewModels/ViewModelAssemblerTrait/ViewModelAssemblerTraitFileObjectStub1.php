<?php declare(strict_types=1);

namespace OpenClassrooms\CodeGenerator\Tests\Doubles\Entities\Api\ViewModels\ViewModelAssemblerTrait;

use OpenClassrooms\CodeGenerator\Entities\Object\FileObject;

class ViewModelAssemblerTraitFileObjectStub1 extends FileObject
{
    const CLASS_NAME = 'OpenClassrooms\CodeGenerator\Tests\Fixtures\Classes\Api\ViewModels\Domain\SubDomain\FunctionalEntityViewModelAssemblerTrait';

    public function __construct()
    {
        $this->content = __DIR__ . '/../../../../../Fixtures/Classes/Api/ViewModels/Domain/SubDomain/FunctionalEntityViewModelAssemblerTrait.php';
        $this->className = self::CLASS_NAME;
        $this->fields = [
            new ViewModelAssemblerTraitFieldObjectStub2(),
            new ViewModelAssemblerTraitFieldObjectStub3(),
            new ViewModelAssemblerTraitFieldObjectStub4(),
            new ViewModelAssemblerTraitFieldObjectStub1(),
        ];
    }
}
