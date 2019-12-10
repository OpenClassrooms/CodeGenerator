<?php declare(strict_types=1);

namespace OpenClassrooms\CodeGenerator\Tests\Doubles\Entities\Api\ViewModels\ViewModelListItemTestCase;

use OpenClassrooms\CodeGenerator\Entities\Object\FileObject;

class ViewModelListItemTestCaseFileObjectStub1 extends FileObject
{
    const CLASS_NAME = 'OpenClassrooms\CodeGenerator\Tests\Fixtures\Classes\Tests\Doubles\Api\ViewModels\Domain\SubDomain\FunctionalEntityViewModelListItemTestCase';

    public function __construct()
    {
        $this->content = __DIR__ . '/../../../../../Fixtures/Classes/Tests/Doubles/Api/ViewModels/Domain/SubDomain/FunctionalEntityViewModelListItemTestCase.php';
        $this->className = self::CLASS_NAME;
        $this->fields = [
        ];
    }
}
