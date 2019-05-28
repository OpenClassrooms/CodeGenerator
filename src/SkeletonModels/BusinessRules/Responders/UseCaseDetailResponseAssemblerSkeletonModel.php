<?php declare(strict_types=1);

namespace OpenClassrooms\CodeGenerator\SkeletonModels\BusinessRules\Responders;

use OpenClassrooms\CodeGenerator\SkeletonModels\AbstractSkeletonModel;

/**
 * @author Samuel Gomis <samuel.gomis@external.openclassrooms.com>
 */
abstract class UseCaseDetailResponseAssemblerSkeletonModel extends AbstractSkeletonModel
{
    public $entityClassName;

    public $entityShortName;

    public $useCaseDetailResponseShortName;

    public $templatePath = 'BusinessRules/Responders/UseCaseDetailResponseAssembler.php.twig';
}
