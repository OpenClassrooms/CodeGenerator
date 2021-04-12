<?php

declare(strict_types=1);

namespace OpenClassrooms\CodeGenerator\SkeletonModels;

use OpenClassrooms\CodeGenerator\Entities\Object\FieldObject;
use OpenClassrooms\CodeGenerator\Entities\Object\MethodObject;

abstract class AbstractSkeletonModel
{
    public string $className;

    /**
     * @var FieldObject[]
     */
    public array $fields = [];

    /**
     * @var MethodObject[]
     */
    public array $methods = [];

    public string $namespace;

    public string $shortName;

    public string $templatePath;

    public function getTemplatePath(): string
    {
        return $this->templatePath;
    }
}
