<?php declare(strict_types=1);

namespace OpenClassrooms\CodeGenerator\Mediators\GenerateGenerator;

/**
 * @author Samuel Gomis <samuel.gomis@external.openclassrooms.com>
 */
interface GenerateGeneratorMediator
{
    public function mediate(array $args = [], array $options = []);
}
