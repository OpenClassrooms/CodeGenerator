<?php declare(strict_types=1);

namespace OpenClassrooms\CodeGenerator\Tests\Doubles\FileObjects\Api\ViewModels\ViewModelListItem;

use OpenClassrooms\CodeGenerator\Entities\FileObject;

/**
 * @author Samuel Gomis <gomis.samuel@external.openclassrooms.com>
 */
class ViewModelListItemFileObjectStub1 extends FileObject
{
    const CLASS_NAME = 'OpenClassrooms\CodeGenerator\Tests\Fixtures\Classes\Api\ViewModels\Domain\SubDomain\FunctionalEntityListItem';

    public function __construct()
    {
        $this->content = __DIR__ . '/../../../../../Fixtures/Classes/Api/ViewModels/Domain/SubDomain/FunctionalEntityListItem.php';
        $this->className = self::CLASS_NAME;
    }
}
