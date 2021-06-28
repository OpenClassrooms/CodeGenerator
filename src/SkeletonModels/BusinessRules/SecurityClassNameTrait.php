<?php

declare(strict_types=1);

namespace OpenClassrooms\CodeGenerator\SkeletonModels\BusinessRules;

trait SecurityClassNameTrait
{
    protected string $securityClassName = '';

    public function setSecurityClassName(string $securityClassName): void
    {
        $this->securityClassName = $securityClassName;
    }
}
