<?php declare(strict_types=1);

namespace OpenClassrooms\CodeGenerator\SkeletonModels\SelfGenerator;

use OpenClassrooms\CodeGenerator\SkeletonModels\AbstractSkeletonModel;

/**
 * @author Samuel Gomis <samuel.gomis@external.openclassrooms.com>
 */
abstract class SelfGeneratorGeneratorSkeletonModel extends AbstractSkeletonModel
{
    public $domain;

    public $entity;

    public $argument;
}
