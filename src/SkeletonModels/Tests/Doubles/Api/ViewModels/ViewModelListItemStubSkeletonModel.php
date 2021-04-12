<?php

declare(strict_types=1);

namespace OpenClassrooms\CodeGenerator\SkeletonModels\Tests\Doubles\Api\ViewModels;

use OpenClassrooms\CodeGenerator\Entities\Object\ConstObject;
use OpenClassrooms\CodeGenerator\SkeletonModels\AbstractSkeletonModel;

abstract class ViewModelListItemStubSkeletonModel extends AbstractSkeletonModel
{
    /**
     * @var ConstObject[]
     */
    public array $constants;

    public array $dateTimeType;

    public bool $hasConstructor = false;

    public string $parentClassName;

    public string $parentShortName;

    public string $templatePath = 'Tests/Doubles/Api/ViewModels/ViewModelListItemStub.php.twig';

    public string $useCaseListItemResponseStubClassName;
}
