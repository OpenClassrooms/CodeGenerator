<?php declare(strict_types=1);

namespace OpenClassrooms\CodeGenerator\Tests\Doubles\FileObjects\Api\ViewModels\ViewModelDetailAssembler;

use OpenClassrooms\CodeGenerator\Entities\FileObject;

/**
 * @author Samuel Gomis <gomis.samuel@external.openclassrooms.com>
 */
class ViewModelDetailAssemblerFileObjectStub1 extends FileObject
{
    const CLASS_NAME = 'OpenClassrooms\CodeGenerator\Tests\Fixtures\Classes\Api\ViewModels\Domain\SubDomain\FunctionalEntityDetailAssembler';

    public function __construct()
    {
        $this->content = __DIR__ . '/../../../../../Fixtures/Classes/Api/ViewModels/Domain/SubDomain/FunctionalEntityDetailAssembler.php';
        $this->className = self::CLASS_NAME;
        $this->fields = [];
    }
}
