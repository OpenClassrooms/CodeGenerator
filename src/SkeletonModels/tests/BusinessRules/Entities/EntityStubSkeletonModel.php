<?php declare(strict_types=1);

namespace OpenClassrooms\CodeGenerator\SkeletonModels\tests\BusinessRules\Entities;

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

    public $templatePath = 'tests/BusinessRules/Entities/EntityStub.php.twig';
}
