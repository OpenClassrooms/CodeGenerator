<?php declare(strict_types=1);

namespace OpenClassrooms\CodeGenerator\Tests\Doubles\FileObjects\Api\ViewModels\ViewModelDetailStub;

use OpenClassrooms\CodeGenerator\Entities\FileObject;

/**
 * @author Samuel Gomis <gomis.samuel@external.openclassrooms.com>
 */
class ViewModelDetailStubFileObjectStub1 extends FileObject
{
    const CLASS_NAME = 'OpenClassrooms\CodeGenerator\Tests\Fixtures\Classes\tests\Doubles\Api\ViewModels\Domain\SubDomain\FunctionalEntityDetailStub1';

    public function __construct()
    {
        $this->content = __DIR__ . '/../../../../../Fixtures/Classes/tests/Doubles/Api/ViewModels/Domain/SubDomain/FunctionalEntityDetailStub1.php';
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
