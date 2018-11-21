<?php declare(strict_types=1);

namespace OpenClassrooms\CodeGenerator\Tests\Doubles\FileObjects\Api\ViewModels\ViewModelTestCase;

use OpenClassrooms\CodeGenerator\FileObjects\FileObject;
use OpenClassrooms\CodeGenerator\Tests\Doubles\FileObjects\Api\ViewModels\ViewModel\ViewModelFieldObjectStub1;
use OpenClassrooms\CodeGenerator\Tests\Doubles\FileObjects\Api\ViewModels\ViewModel\ViewModelFieldObjectStub2;
use OpenClassrooms\CodeGenerator\Tests\Doubles\FileObjects\Api\ViewModels\ViewModel\ViewModelFieldObjectStub3;
use OpenClassrooms\CodeGenerator\Tests\Doubles\FileObjects\Api\ViewModels\ViewModel\ViewModelFieldObjectStub4;

/**
 * @author Samuel Gomis <gomis.samuel@external.openclassrooms.com>
 */
class ViewModelTestCaseFileObjectStub1 extends FileObject
{
    const CLASS_NAME = 'OpenClassrooms\CodeGenerator\Tests\Fixtures\Classes\tests\Doubles\Api\ViewModels\Domain\SubDomain\FunctionalEntityTestCase';

    public function __construct()
    {
        $this->content = __DIR__ . '/../../../../../Fixtures/Classes/tests/Doubles/Api/ViewModels/Domain/SubDomain/FunctionalEntityTestCase.php';
        $this->className = self::CLASS_NAME;
        $this->fields = [
            new ViewModelFieldObjectStub1(),
            new ViewModelFieldObjectStub2(),
            new ViewModelFieldObjectStub3(),
            new ViewModelFieldObjectStub4(),
        ];
    }
}
