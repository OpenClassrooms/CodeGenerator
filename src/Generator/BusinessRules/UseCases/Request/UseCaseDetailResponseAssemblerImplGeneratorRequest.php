<?php

declare(strict_types=1);

namespace OpenClassrooms\CodeGenerator\Generator\BusinessRules\UseCases\Request;

use OpenClassrooms\CodeGenerator\Generator\GeneratorRequest;

interface UseCaseDetailResponseAssemblerImplGeneratorRequest extends GeneratorRequest
{
    public function getEntityClassName(): string;

    /**
     * @return string[]
     */
    public function getFields(): array;
}
