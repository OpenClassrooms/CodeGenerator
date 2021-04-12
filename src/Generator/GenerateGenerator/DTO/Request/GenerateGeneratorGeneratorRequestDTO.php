<?php

declare(strict_types=1);

namespace OpenClassrooms\CodeGenerator\Generator\GenerateGenerator\DTO\Request;

use OpenClassrooms\CodeGenerator\Generator\GenerateGenerator\Request\GenerateGeneratorGeneratorRequest;

class GenerateGeneratorGeneratorRequestDTO implements GenerateGeneratorGeneratorRequest
{
    public string $constructionPattern;

    public string $domain;

    public string $entity;

    public function getConstructionPattern(): string
    {
        return $this->constructionPattern;
    }

    public function getDomain(): string
    {
        return $this->domain;
    }

    public function getEntity(): string
    {
        return $this->entity;
    }
}
