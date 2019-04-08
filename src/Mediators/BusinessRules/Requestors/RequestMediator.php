<?php declare(strict_types=1);

namespace OpenClassrooms\CodeGenerator\Mediators\BusinessRules\Requestors;

/**
 * @author Samuel Gomis <samuel.gomis@external.openclassrooms.com>
 */
interface RequestMediator
{
    public function mediate(array $args = [], array $options = []): array;
}
