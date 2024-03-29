<?php

declare(strict_types=1);

namespace OpenClassrooms\CodeGenerator\Tests\Doubles\Entities\Api\ViewModels\ViewModelDetailAssembler;

use OpenClassrooms\CodeGenerator\Entities\Object\FileObject;

class ViewModelDetailAssemblerFileObjectStub1 extends FileObject
{
    public const CLASS_NAME = 'OpenClassrooms\CodeGenerator\Tests\Fixtures\Classes\Api\ViewModels\Domain\SubDomain\FunctionalEntityViewModelDetailAssembler';

    public function __construct()
    {
        $this->content = __DIR__ . '/../../../../../Fixtures/Classes/Api/ViewModels/Domain/SubDomain/FunctionalEntityViewModelDetailAssembler.php';
        $this->className = self::CLASS_NAME;
    }
}
