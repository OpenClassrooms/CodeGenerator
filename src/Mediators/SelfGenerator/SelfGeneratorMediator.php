<?php declare(strict_types=1);

namespace OpenClassrooms\CodeGenerator\Mediators\SelfGenerator;

/**
 * @author Samuel Gomis <samuel.gomis@external.openclassrooms.com>
 */
interface SelfGeneratorMediator
{
    public function mediate(array $args = [], array $options = []);
}
