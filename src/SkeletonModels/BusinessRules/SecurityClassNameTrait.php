<?php

declare(strict_types=1);

namespace OpenClassrooms\CodeGenerator\SkeletonModels\BusinessRules;

trait SecurityClassNameTrait
{
    /**
     * @var string
     */
    protected $securityClassName;

    public function setSecurityClassName(string $securityClassName): void
    {
        $this->securityClassName = $securityClassName;
    }
}
