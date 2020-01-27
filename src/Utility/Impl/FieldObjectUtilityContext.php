<?php

declare(strict_types=1);

namespace OpenClassrooms\CodeGenerator\Utility\Impl;

use OpenClassrooms\CodeGenerator\Utility\FieldObjectUtilityStrategy;

final class FieldObjectUtilityContext implements FieldObjectUtilityStrategy
{
    private $strategy;

    public function __construct(FieldObjectUtilityStrategy $strategy)
    {
        $this->strategy = $strategy;
    }

    public function getFields(string $className): array
    {
        return $this->strategy->getFields($className);
    }
}
