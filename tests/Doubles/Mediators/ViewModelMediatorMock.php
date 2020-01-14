<?php declare(strict_types=1);

namespace OpenClassrooms\CodeGenerator\Tests\Doubles\Mediators;

use OpenClassrooms\CodeGenerator\Mediators\Api\ViewModels\Impl\ViewModelMediatorImpl;
use OpenClassrooms\CodeGenerator\Tests\Doubles\Entities\Api\ViewModels\ViewModel\ViewModelFileObjectStub1;
use OpenClassrooms\CodeGenerator\Tests\Doubles\Entities\Api\ViewModels\ViewModelDetail\ViewModelDetailFileObjectStub1;
use OpenClassrooms\CodeGenerator\Tests\Doubles\Entities\Api\ViewModels\ViewModelDetailImpl\ViewModelDetailImplFileObjectStub1;
use OpenClassrooms\CodeGenerator\Tests\Doubles\Entities\Api\ViewModels\ViewModelListItem\ViewModelListItemFileObjectStub1;
use OpenClassrooms\CodeGenerator\Tests\Doubles\Entities\Api\ViewModels\ViewModelListItemImpl\ViewModelListItemImplFileObjectStub1;

class ViewModelMediatorMock extends ViewModelMediatorImpl
{
    public static $alreadyExistFileObjects = [];

    public static $fileObjects = [];

    public function __construct()
    {
        self::$fileObjects = [
            new ViewModelFileObjectStub1(),
            new ViewModelDetailFileObjectStub1(),
            new ViewModelDetailImplFileObjectStub1(),
            new ViewModelListItemFileObjectStub1(),
            new ViewModelListItemImplFileObjectStub1(),
        ];
    }

    public function mediate(array $args = [], array $options = []): array
    {
        return self::$fileObjects;
    }
}
