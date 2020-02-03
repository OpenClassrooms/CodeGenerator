<?php

declare(strict_types=1);

namespace OpenClassrooms\CodeGenerator\Tests\Fixtures\Classes\BusinessRules\UseCases;

trait CreateRequestTrait
{
    public function __call($name, $arguments)
    {
        if (preg_match('/is(.+)Updated/', $name)) {
            return true;
        }
    }
}
