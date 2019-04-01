<?php declare(strict_types=1);

namespace OpenClassrooms\CodeGenerator\Tests\Doubles\FileObjects\Api\ViewModels\ViewModelDetailTestCase;

use OpenClassrooms\CodeGenerator\Entities\FileObject;
use OpenClassrooms\CodeGenerator\Tests\Doubles\FileObjects\Api\ViewModels\ViewModelDetail\ViewModelDetailFieldObjectStub1;

/**
 * @author Samuel Gomis <gomis.samuel@external.openclassrooms.com>
 */
class ViewModelDetailTestCaseFileObjectStub1 extends FileObject
{
    const CLASS_NAME = 'OpenClassrooms\CodeGenerator\Tests\Fixtures\Classes\tests\Doubles\Api\ViewModels\Domain\SubDomain\FunctionalEntityDetailTestCase';

    public function __construct()
    {
        $this->content = __DIR__ . '/../../../../../Fixtures/Classes/tests/Doubles/Api/ViewModels/Domain/SubDomain/FunctionalEntityDetailTestCase.php';
        $this->className = self::CLASS_NAME;
        $this->fields = [
            new ViewModelDetailFieldObjectStub1(),
        ];
    }
}
