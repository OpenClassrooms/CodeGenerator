<?php

declare(strict_types=1);

namespace OpenClassrooms\CodeGenerator\SkeletonModels\Api\Controller\Impl;

trait AbstractControllerClassNameTrait
{
    protected string $abstractControllerClassName;

    public function setAbstractControllerClassName(string $abstractControllerClassName): void
    {
        $this->abstractControllerClassName = $abstractControllerClassName;
    }
}
