<?php declare(strict_types=1);

namespace OpenClassrooms\CodeGenerator\Generator\BusinessRules\UseCases\DTO\Request;

use OpenClassrooms\CodeGenerator\Generator\BusinessRules\UseCases\Request\GetFunctionalEntityGeneratorRequest;
use OpenClassrooms\CodeGenerator\Generator\BusinessRules\UseCases\Request\GetFunctionalEntityGeneratorRequestBuilder;

/**
 * @author Samuel Gomis <samuel.gomis@external.openclassrooms.com>
 */
class GetFunctionalEntityGeneratorRequestBuilderImpl implements GetFunctionalEntityGeneratorRequestBuilder
{
    /**
     * @var GetFunctionalEntityGeneratorRequestDTO
     */
    private $request;

    public function create(): GetFunctionalEntityGeneratorRequestBuilder
    {
        $this->request = new GetFunctionalEntityGeneratorRequestDTO();

        return $this;
    }

    public function withEntity(string $entity): GetFunctionalEntityGeneratorRequestBuilder
    {
        $this->request->entity = $entity;

        return $this;
    }

    public function build(): GetFunctionalEntityGeneratorRequest
    {
        return $this->request;
    }
}
