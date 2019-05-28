<?php declare(strict_types=1);

namespace OpenClassrooms\CodeGenerator\Services;

/**
 * @author Samuel Gomis <samuel.gomis@external.openclassrooms.com>
 */
interface TemplatingService
{
    public function render($name, array $context = []): string;
}
