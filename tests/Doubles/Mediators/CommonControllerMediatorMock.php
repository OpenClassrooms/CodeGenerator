<?php declare(strict_types=1);

namespace OpenClassrooms\CodeGenerator\Tests\Doubles\Mediators;

use OpenClassrooms\CodeGenerator\Mediators\Api\Controller\Impl\CommonControllerMediatorImpl;
use OpenClassrooms\CodeGenerator\Tests\Doubles\Entities\Api\Controller\DeleteEntityControllerFileObjectStub1;
use OpenClassrooms\CodeGenerator\Tests\Doubles\Entities\Api\Controller\GetEntitiesControllerFileObjectStub1;
use OpenClassrooms\CodeGenerator\Tests\Doubles\Entities\Api\Controller\GetEntityControllerFileObjectStub1;
use OpenClassrooms\CodeGenerator\Tests\Doubles\Entities\Api\Controller\PatchEntityControllerFileObjectStub1;
use OpenClassrooms\CodeGenerator\Tests\Doubles\Entities\Api\Controller\PostEntityControllerFileObjectStub1;
use OpenClassrooms\CodeGenerator\Tests\Doubles\Entities\Api\Models\EntityModelTraitFileObjectStub1;
use OpenClassrooms\CodeGenerator\Tests\Doubles\Entities\Api\Models\PatchEntityModelFileObjectStub1;
use OpenClassrooms\CodeGenerator\Tests\Doubles\Entities\Api\Models\PostEntityModelFileObjectStub1;

class CommonControllerMediatorMock extends CommonControllerMediatorImpl
{
    public static $alreadyExistFileObjects = [];

    public static $fileObjects = [];

    public function __construct()
    {
        self::$fileObjects = [
            new DeleteEntityControllerFileObjectStub1(),
            new GetEntityControllerFileObjectStub1(),
            new GetEntitiesControllerFileObjectStub1(),
            new PatchEntityControllerFileObjectStub1(),
            new EntityModelTraitFileObjectStub1(),
            new PatchEntityModelFileObjectStub1(),
            new PostEntityControllerFileObjectStub1(),
            new EntityModelTraitFileObjectStub1(),
            new PostEntityModelFileObjectStub1(),
        ];
    }

    public function mediate(array $args = [], array $options = []): array
    {
        return self::$fileObjects;
    }
}
