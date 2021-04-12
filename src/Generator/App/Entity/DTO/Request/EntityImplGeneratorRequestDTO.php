<?php

declare(strict_types=1);

namespace OpenClassrooms\CodeGenerator\Generator\App\Entity\DTO\Request;

use OpenClassrooms\CodeGenerator\Generator\App\Entity\Request\EntityImplGeneratorRequest;

class EntityImplGeneratorRequestDTO implements EntityImplGeneratorRequest
{
    public string $className;

    public function getUseCaseResponseClassName(): string
    {
        return $this->className;
    }
}
