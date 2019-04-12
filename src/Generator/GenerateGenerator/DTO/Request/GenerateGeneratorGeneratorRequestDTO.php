<?php declare(strict_types=1);

namespace OpenClassrooms\CodeGenerator\Generator\GenerateGenerator\DTO\Request;

use OpenClassrooms\CodeGenerator\Generator\GenerateGenerator\Request\GenerateGeneratorGeneratorRequest;

/**
 * @author Samuel Gomis <samuel.gomis@external.openclassrooms.com>
 */
class GenerateGeneratorGeneratorRequestDTO implements GenerateGeneratorGeneratorRequest
{
    /**
     * @var string
     */
    public $domain;

    /**
     * @var string
     */
    public $entity;

    /**
     * @var string
     */
    public $constructionPattern;

    public function getDomain(): string
    {
        return $this->domain;
    }

    public function getEntity(): string
    {
        return $this->entity;
    }

    public function getConstructionPattern(): string
    {
        return $this->constructionPattern;
    }
}
