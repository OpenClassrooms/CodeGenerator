<?php

declare(strict_types=1);

namespace OpenClassrooms\CodeGenerator\Tests\Doubles\Entities\Api\ViewModels\ViewModelListItemImpl;

use OpenClassrooms\CodeGenerator\Entities\Object\FileObject;

class ViewModelListItemImplFileObjectStub1 extends FileObject
{
    const CLASS_NAME = 'OpenClassrooms\CodeGenerator\Tests\Fixtures\Classes\Api\ViewModels\Domain\SubDomain\Impl\FunctionalEntityViewModelListItemImpl';

    public function __construct()
    {
        $this->content = __DIR__ . '/../../../../../Fixtures/Classes/Api/ViewModels/Domain/SubDomain/Impl/FunctionalEntityViewModelListItemImpl.php';
        $this->className = self::CLASS_NAME;
    }
}
