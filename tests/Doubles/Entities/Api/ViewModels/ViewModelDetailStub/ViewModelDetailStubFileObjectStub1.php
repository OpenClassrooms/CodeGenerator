<?php

declare(strict_types=1);

namespace OpenClassrooms\CodeGenerator\Tests\Doubles\Entities\Api\ViewModels\ViewModelDetailStub;

use OpenClassrooms\CodeGenerator\Entities\Object\FileObject;

final class ViewModelDetailStubFileObjectStub1 extends FileObject
{
    private const CLASS_NAME = 'OpenClassrooms\CodeGenerator\Tests\Fixtures\Classes\Tests\Doubles\Api\ViewModels\Domain\SubDomain\FunctionalEntityViewModelDetailStub1';

    public function __construct()
    {
        $this->content = __DIR__ . '/../../../../../Fixtures/Classes/Tests/Doubles/Api/ViewModels/Domain/SubDomain/FunctionalEntityViewModelDetailStub1.php';
        $this->className = self::CLASS_NAME;
        $this->fields = [
            new ViewModelDetailStubFieldObjectStub2(),
            new ViewModelDetailStubFieldObjectStub3(),
            new ViewModelDetailStubFieldObjectStub4(),
            new ViewModelDetailStubFieldObjectStub5(),
            new ViewModelDetailStubFieldObjectStub1(),
        ];
    }
}
