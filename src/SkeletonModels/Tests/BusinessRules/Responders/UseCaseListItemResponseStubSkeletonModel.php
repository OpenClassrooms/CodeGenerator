<?php

declare(strict_types=1);

namespace OpenClassrooms\CodeGenerator\SkeletonModels\Tests\BusinessRules\Responders;

use OpenClassrooms\CodeGenerator\SkeletonModels\AbstractSkeletonModel;

abstract class UseCaseListItemResponseStubSkeletonModel extends AbstractSkeletonModel
{
    public string $templatePath = 'Tests/Doubles/BusinessRules/Responders/UseCaseListItemResponseStub.php.twig';
}
