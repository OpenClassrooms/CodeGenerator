<?php declare(strict_types=1);

namespace OpenClassrooms\CodeGenerator\SkeletonModels;

/**
 * @author Samuel Gomis <gomis.samuel@external.openclassrooms.com>
 */
class AbstractSkeletonModel
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
    public $shortName;

    public $templatePath;

    public function getTemplatePath(): string
    {
        return $this->templatePath;
    }
}
