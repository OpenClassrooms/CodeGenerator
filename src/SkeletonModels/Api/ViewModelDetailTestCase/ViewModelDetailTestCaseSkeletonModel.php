<?php declare(strict_types=1);

namespace OpenClassrooms\CodeGenerator\SkeletonModels\Api\ViewModelDetailTestCase;

use OpenClassrooms\CodeGenerator\SkeletonModels\AbstractSkeletonModel;

/**
 * @author Samuel Gomis <gomis.samuel@external.openclassrooms.com>
 */
abstract class ViewModelDetailTestCaseSkeletonModel extends AbstractSkeletonModel
{
    public $sourceClassName;

    public $sourceShortName;

    public $templatePath = 'tests/Doubles/ViewModelDetailTestCase.php.twig';

    public function getParentShortName(): string
    {
        return str_replace('Detail', '', $this->shortName);
    }
}
