<?php declare(strict_types=1);

namespace OpenClassrooms\CodeGenerator\Generator\SelfGenerator\DTO\Request;

use OpenClassrooms\CodeGenerator\Generator\SelfGenerator\Request\SelfGeneratorGeneratorRequest;
use OpenClassrooms\CodeGenerator\Generator\SelfGenerator\Request\SelfGeneratorGeneratorRequestBuilder;

/**
 * @author Samuel Gomis <samuel.gomis@external.openclassrooms.com>
 */
class SelfGeneratorGeneratorRequestBuilderImpl implements SelfGeneratorGeneratorRequestBuilder
{
    /**
     * @var SelfGeneratorGeneratorRequestDTO
     */
    private $request;

    public function create(): SelfGeneratorGeneratorRequestBuilder
    {
        $this->request = new SelfGeneratorGeneratorRequestDTO();

        return $this;
    }

    public function withDomain(string $domain): SelfGeneratorGeneratorRequestBuilder
    {
        $this->request->domain = $domain;

        return $this;
    }

    public function withEntity(string $entity): SelfGeneratorGeneratorRequestBuilder
    {
        $this->request->entity = $entity;

        return $this;
    }

    public function build(): SelfGeneratorGeneratorRequest
    {
        return $this->request;
    }
}
