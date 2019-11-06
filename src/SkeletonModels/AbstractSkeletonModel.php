<?php declare(strict_types=1);

namespace OpenClassrooms\CodeGenerator\SkeletonModels;

use OpenClassrooms\CodeGenerator\Entities\Object\FieldObject;
use OpenClassrooms\CodeGenerator\Entities\Object\MethodObject;

/**
 * @author Samuel Gomis <samuel.gomis@external.openclassrooms.com>
 */
class AbstractSkeletonModel
{
    /**
     * @var string
     */
    public $className;

    /**
     * @var FieldObject[]
     */
    public $fields = [];

    /**
     * @var MethodObject[]
     */
    public $methods = [];

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
