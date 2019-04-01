<?php declare(strict_types=1);

namespace OpenClassrooms\CodeGenerator\Tests\Doubles\FileObjects\Api\ViewModels\ViewModelListItemAssembler;

use OpenClassrooms\CodeGenerator\Entities\FileObject;

/**
 * @author Samuel Gomis <gomis.samuel@external.openclassrooms.com>
 */
class ViewModelListItemAssemblerFileObjectStub1 extends FileObject
{
    const CLASS_NAME = 'OpenClassrooms\CodeGenerator\Tests\Fixtures\Classes\Api\ViewModels\Domain\SubDomain\FunctionalEntityListItemAssembler';

    public function __construct()
    {
        $this->content = __DIR__ . '/../../../../../Fixtures/Classes/Api/ViewModels/Domain/SubDomain/FunctionalEntityListItemAssembler.php';
        $this->className = self::CLASS_NAME;
        $this->fields = [];
    }
}
