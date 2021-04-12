<?php

declare(strict_types=1);

namespace OpenClassrooms\CodeGenerator\Utility\Impl;

use OpenClassrooms\CodeGenerator\Utility\StubUtilityStrategy;

final class StubUtilityContext implements StubUtilityStrategy
{
    private StubUtilityStrategy $strategy;

    public function __construct(StubUtilityStrategy $strategy)
    {
        $this->strategy = $strategy;
    }

    /**
     * @return mixed
     */
    public function createFakeValue(string $type, string $fieldName, string $entityName)
    {
        return $this->strategy->createFakeValue($type, $fieldName, $entityName);
    }
}
