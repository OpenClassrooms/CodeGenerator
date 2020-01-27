<?php

declare(strict_types=1);

namespace OpenClassrooms\CodeGenerator\Utility;

interface MethodUtilityStrategy
{
    public function getAccessors(string $className): array;
}
