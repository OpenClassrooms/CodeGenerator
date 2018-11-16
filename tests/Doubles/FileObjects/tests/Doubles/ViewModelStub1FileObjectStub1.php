<?php declare(strict_types=1);

namespace OpenClassrooms\CodeGenerator\Tests\Doubles\FileObjects\tests\Doubles;

use OpenClassrooms\CodeGenerator\FileObjects\FileObject;

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
    }
}
