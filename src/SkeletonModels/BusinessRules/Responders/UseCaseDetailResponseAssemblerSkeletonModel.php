<?php

declare(strict_types=1);

namespace OpenClassrooms\CodeGenerator\SkeletonModels\BusinessRules\Responders;

use OpenClassrooms\CodeGenerator\SkeletonModels\AbstractSkeletonModel;

abstract class UseCaseDetailResponseAssemblerSkeletonModel extends AbstractSkeletonModel
{
    public $entityClassName;

    public $entityShortName;

    public $templatePath = 'BusinessRules/Responders/UseCaseDetailResponseAssembler.php.twig';

    public $useCaseDetailResponseShortName;
}
