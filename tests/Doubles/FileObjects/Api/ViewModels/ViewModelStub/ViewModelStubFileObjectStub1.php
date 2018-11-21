<?php declare(strict_types=1);

namespace OpenClassrooms\CodeGenerator\Tests\Doubles\FileObjects\Api\ViewModels\ViewModelStub;

use OpenClassrooms\CodeGenerator\FileObjects\FileObject;
use OpenClassrooms\CodeGenerator\Tests\Doubles\FileObjects\Entities\Domain\SubDomain\FunctionalEntityStub1;

/**
 * @author Samuel Gomis <gomis.samuel@external.openclassrooms.com>
 */
class ViewModelStubFileObjectStub1 extends FileObject
{
    const CLASS_NAME = 'OpenClassrooms\CodeGenerator\Tests\Fixtures\Classes\tests\Doubles\Api\ViewModels\Domain\SubDomain\FunctionalEntityStub1';

    public function __construct()
    {
        $this->content = __DIR__ . '/../../../../../Fixtures/Classes/tests/Doubles/Api/ViewModels/Domain/SubDomain/FunctionalEntityStub1.php';
        $this->className = self::CLASS_NAME;
        $this->fields = [
            new ViewModelStubFieldObjectStub2(),
            new ViewModelStubFieldObjectStub3(),
            new ViewModelStubFieldObjectStub4(),
            new ViewModelStubFieldObjectStub1(),
        ];
    }
}
