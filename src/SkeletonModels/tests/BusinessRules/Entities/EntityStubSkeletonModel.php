<?php declare(strict_types=1);

namespace OpenClassrooms\CodeGenerator\SkeletonModels\Tests\BusinessRules\Entities;

use OpenClassrooms\CodeGenerator\FileObjects\ConstObject;
use OpenClassrooms\CodeGenerator\SkeletonModels\AbstractSkeletonModel;

/**
 * @author Samuel Gomis <gomis.samuel@external.openclassrooms.com>
 */
abstract class EntityStubSkeletonModel extends AbstractSkeletonModel
{
    /**
     * @var ConstObject[]
     */
    public $constants;

    /**
     * @var array
     */
    public $dateTimeType;

    /**
     * @var bool
     */
    public $hasConstructor;

    /**
     * @var string
     */
    public $parentClassName;

    /**
     * @var string
     */
    public $parentShortName;

    public $templatePath = 'tests/Doubles/BusinessRules/Entities/EntityStub.php.twig';
}
