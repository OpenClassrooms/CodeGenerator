<?php

declare(strict_types=1);

namespace OpenClassrooms\CodeGenerator\Tests\Doubles\Entities\Api\ViewModels\ViewModelDetailTestCase;

use OpenClassrooms\CodeGenerator\Entities\Object\FileObject;
use OpenClassrooms\CodeGenerator\Tests\Doubles\Entities\Api\ViewModels\ViewModelDetail\ViewModelDetailFieldObjectStub1;

class ViewModelDetailTestCaseFileObjectStub1 extends FileObject
{
    const CLASS_NAME = 'OpenClassrooms\CodeGenerator\Tests\Fixtures\Classes\Tests\Doubles\Api\ViewModels\Domain\SubDomain\FunctionalEntityViewModelDetailTestCase';

    public function __construct()
    {
        $this->content = __DIR__ . '/../../../../../Fixtures/Classes/Tests/Doubles/Api/ViewModels/Domain/SubDomain/FunctionalEntityViewModelDetailTestCase.php';
        $this->className = self::CLASS_NAME;
        $this->fields = [
            new ViewModelDetailFieldObjectStub1(),
        ];
    }
}
