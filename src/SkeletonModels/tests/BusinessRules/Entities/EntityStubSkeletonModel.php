<?php declare(strict_types=1);

namespace OpenClassrooms\CodeGenerator\SkeletonModels\tests\BusinessRules\Entities;

use OpenClassrooms\CodeGenerator\FileObjects\ConstObject;
use OpenClassrooms\CodeGenerator\SkeletonModels\AbstractSkeletonModel;

/**
 * @author Samuel Gomis <gomis.samuel@external.openclassrooms.com>
 */
abstract class EntityStubSkeletonModel extends AbstractSkeletonModel
{
    /**
     * @var string
     */
    public $parentClassName;

    /**
     * @var string
     */
    public $parentShortName;

    /**
     * @var ConstObject[]
     */
    public $constants;

    /**
     * @var bool
     */
    public $hasConstructor;

    public $templatePath = 'tests/Doubles/BusinessRules/Entities/EntityStub.php.twig';
}
