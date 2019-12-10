<?php declare(strict_types=1);

namespace OpenClassrooms\CodeGenerator\Generator\GenerateGenerator\DTO\Request;

use OpenClassrooms\CodeGenerator\Generator\GenerateGenerator\Request\GenerateGeneratorGeneratorRequest;
use OpenClassrooms\CodeGenerator\Generator\GenerateGenerator\Request\GenerateGeneratorGeneratorRequestBuilder;

class GenerateGeneratorGeneratorRequestBuilderImpl implements GenerateGeneratorGeneratorRequestBuilder
{
    /**
     * @var GenerateGeneratorGeneratorRequestDTO
     */
    private $request;

    public function build(): GenerateGeneratorGeneratorRequest
    {
        return $this->request;
    }

    public function create(): GenerateGeneratorGeneratorRequestBuilder
    {
        $this->request = new GenerateGeneratorGeneratorRequestDTO();

        return $this;
    }

    public function withConstructionPattern(string $constructionPattern): GenerateGeneratorGeneratorRequestBuilder
    {
        $this->request->constructionPattern = $constructionPattern;

        return $this;
    }

    public function withDomain(string $domain): GenerateGeneratorGeneratorRequestBuilder
    {
        $this->request->domain = $domain;

        return $this;
    }

    public function withEntityClassName(string $entity): GenerateGeneratorGeneratorRequestBuilder
    {
        $this->request->entity = $entity;

        return $this;
    }
}
