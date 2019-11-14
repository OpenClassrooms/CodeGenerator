<?php declare(strict_types=1);

namespace OpenClassrooms\CodeGenerator\Tests\Doubles\Entities\Api\ViewModels\ViewModelTestCase;

use OpenClassrooms\CodeGenerator\Entities\Object\FileObject;
use OpenClassrooms\CodeGenerator\Tests\Doubles\Entities\Api\ViewModels\ViewModel\ViewModelFieldObjectStub1;
use OpenClassrooms\CodeGenerator\Tests\Doubles\Entities\Api\ViewModels\ViewModel\ViewModelFieldObjectStub2;
use OpenClassrooms\CodeGenerator\Tests\Doubles\Entities\Api\ViewModels\ViewModel\ViewModelFieldObjectStub3;
use OpenClassrooms\CodeGenerator\Tests\Doubles\Entities\Api\ViewModels\ViewModel\ViewModelFieldObjectStub4;

/**
 * @author Samuel Gomis <samuel.gomis@external.openclassrooms.com>
 */
class ViewModelTestCaseFileObjectStub1 extends FileObject
{
    const CLASS_NAME = 'OpenClassrooms\CodeGenerator\Tests\Fixtures\Classes\Tests\Doubles\Api\ViewModels\Domain\SubDomain\FunctionalEntityViewModelTestCase';

    public function __construct()
    {
        $this->content = __DIR__ . '/../../../../../Fixtures/Classes/Tests/Doubles/Api/ViewModels/Domain/SubDomain/FunctionalEntityViewModelTestCase.php';
        $this->className = self::CLASS_NAME;
        $this->fields = [
            new ViewModelFieldObjectStub1(),
            new ViewModelFieldObjectStub2(),
            new ViewModelFieldObjectStub3(),
            new ViewModelFieldObjectStub4(),
        ];
    }
}
