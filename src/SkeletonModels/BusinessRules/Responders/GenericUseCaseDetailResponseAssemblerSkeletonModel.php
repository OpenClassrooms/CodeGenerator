<?php declare(strict_types=1);

namespace OpenClassrooms\CodeGenerator\SkeletonModels\BusinessRules\Responders;

use OpenClassrooms\CodeGenerator\SkeletonModels\AbstractSkeletonModel;

/**
 * @author Samuel Gomis <samuel.gomis@external.openclassrooms.com>
 */
abstract class GenericUseCaseDetailResponseAssemblerSkeletonModel extends AbstractSkeletonModel
{
    public $entityClassName;

    public $entityShortName;

    public $genericUseCaseDetailResponseShortName;

    public $templatePath = 'BusinessRules/Responders/GenericUseCaseDetailResponseAssembler.php.twig';
}
