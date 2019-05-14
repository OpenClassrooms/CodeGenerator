<?php declare(strict_types=1);

namespace OpenClassrooms\CodeGenerator\SkeletonModels\Tests\Doubles\BusinessRules\Responders;

use OpenClassrooms\CodeGenerator\SkeletonModels\AbstractSkeletonModel;

/**
 * @author Samuel Gomis <samuel.gomis@external.openclassrooms.com>
 */
abstract class UseCaseDetailResponseAssemblerMockSkeletonModel extends AbstractSkeletonModel
{
    public $templatePath = 'Tests/Doubles/BusinessRules/Responders/UseCaseDetailResponseAssemblerMock.php.twig';

    public $useCaseDetailResponseAssemblerImplClassName;

    public $useCaseDetailResponseAssemblerImplShortName;
}
