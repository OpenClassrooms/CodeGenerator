<?php

declare(strict_types=1);

namespace OpenClassrooms\CodeGenerator\Utility;

interface StubUtilityStrategy
{
    public function createFakeValue(string $type, string $fieldName, string $entityName);
}
