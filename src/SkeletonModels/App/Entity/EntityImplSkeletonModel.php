<?php declare(strict_types=1);

namespace OpenClassrooms\CodeGenerator\SkeletonModels\App\Entity;

use OpenClassrooms\CodeGenerator\SkeletonModels\AbstractSkeletonModel;

/**
 * @author Samuel Gomis <samuel.gomis@external.openclassrooms.com>
 */
abstract class EntityImplSkeletonModel extends AbstractSkeletonModel
{
    public $entityClassName;

    public $entityShortName;

    public $templatePath = 'App/Entity/EntityImpl.php.twig';
}
