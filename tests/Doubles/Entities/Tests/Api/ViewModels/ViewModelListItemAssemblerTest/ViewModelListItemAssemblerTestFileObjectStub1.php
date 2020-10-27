<?php

declare(strict_types=1);

namespace OpenClassrooms\CodeGenerator\Tests\Doubles\Entities\Tests\Api\ViewModels\ViewModelListItemAssemblerTest;

use OpenClassrooms\CodeGenerator\Entities\Object\FileObject;

final class ViewModelListItemAssemblerTestFileObjectStub1 extends FileObject
{
    private const CLASS_NAME = 'OpenClassrooms\CodeGenerator\Tests\Fixtures\Classes\Tests\Api\ViewModels\Domain\SubDomain\FunctionalEntityViewModelListItemAssemblerTest';

    public function __construct()
    {
        $this->content = __DIR__ . '/../../../../../../Fixtures/Classes/Tests/Api/ViewModels/Domain/SubDomain/FunctionalEntityViewModelListItemAssemblerTest.php';
        $this->className = self::CLASS_NAME;
    }
}
