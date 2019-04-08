<?php declare(strict_types=1);

namespace OpenClassrooms\CodeGenerator\Mediators\Api;

/**
 * @author Samuel Gomis <samuel.gomis@external.openclassrooms.com>
 */
interface ViewModelMediator
{
    public function mediate(array $args = [], array $options = []): array;
}
