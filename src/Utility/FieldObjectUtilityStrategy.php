<?php declare(strict_types=1);

namespace OpenClassrooms\CodeGenerator\Utility;

interface FieldObjectUtilityStrategy
{
    public function getFields(string $className): array;
}
