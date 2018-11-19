<?php declare(strict_types=1);

namespace OpenClassrooms\CodeGenerator\Tests\Doubles\FileObjects\tests\Doubles;

use OpenClassrooms\CodeGenerator\FileObjects\FileObject;
use OpenClassrooms\CodeGenerator\Tests\Doubles\FileObjects\Api\ViewModels\ViewModelDetailStub\ViewModelDetailStubFieldObjectStub1;
use OpenClassrooms\CodeGenerator\Tests\Doubles\FileObjects\Api\ViewModels\ViewModelDetailStub\ViewModelDetailStubFieldObjectStub2;
use OpenClassrooms\CodeGenerator\Tests\Doubles\FileObjects\Api\ViewModels\ViewModelDetailStub\ViewModelDetailStubFieldObjectStub3;
use OpenClassrooms\CodeGenerator\Tests\Doubles\FileObjects\Api\ViewModels\ViewModelDetailStub\ViewModelDetailStubFieldObjectStub4;
use OpenClassrooms\CodeGenerator\Tests\Doubles\FileObjects\Api\ViewModels\ViewModelDetailStub\ViewModelDetailStubFieldObjectStub5;

/**
 * @author Samuel Gomis <gomis.samuel@external.openclassrooms.com>
 */
class ViewModelStub1FileObjectStub1 extends FileObject
{
    const CLASS_NAME = 'OpenClassrooms\CodeGenerator\Tests\Fixtures\Classes\tests\Doubles\Api\ViewModels\Domain\SubDomain\FunctionalEntityDetailStub1';

    public function __construct()
    {
        $this->content = __DIR__ . '/../../../../Fixtures/Classes/tests/Doubles/Api/ViewModels/Domain/SubDomain/FunctionalEntityDetailStub1.php';
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
