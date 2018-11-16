<?php declare(strict_types=1);

namespace OpenClassrooms\CodeGenerator\SkeletonModels\tests\Doubles\Api\ViewModels;

/**
 * @author Samuel Gomis <gomis.samuel@external.openclassrooms.com>
 */
abstract class ViewModelDetailStubSkeletonModel
{
    /**
     * @var string
     */
    public $className;

    /**
     * @var array
     */
    public $fields = [];

    /**
     * @var string
     */
    public $namespace;

    /**
     * @var string
     */
    public $parentClassName;

    /**
     * @var string
     */
    public $parentShortName;

    /**
     * @var string
     */
    public $shortName;

    public $templatePath = 'tests/Doubles/ViewModelDetailStub.php.twig';

    public function getTemplatePath(): string
    {
        return $this->templatePath;
    }
}
