<?php declare(strict_types=1);

namespace OpenClassrooms\CodeGenerator\Mediators\BusinessRules;

/**
 * @author Samuel Gomis <gomis.samuel@external.openclassrooms.com>
 */
interface RequestMediator
{
    public function mediate(array $args = [], array $options = []);
}
