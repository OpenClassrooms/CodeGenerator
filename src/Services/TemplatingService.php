<?php

declare(strict_types=1);

namespace OpenClassrooms\CodeGenerator\Services;

interface TemplatingService
{
    public function render($name, array $context = []): string;
}
