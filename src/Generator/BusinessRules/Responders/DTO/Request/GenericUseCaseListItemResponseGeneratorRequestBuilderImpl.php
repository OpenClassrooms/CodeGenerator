<?php declare(strict_types=1);

namespace OpenClassrooms\CodeGenerator\Generator\BusinessRules\Responders\DTO\Request;

use OpenClassrooms\CodeGenerator\Generator\BusinessRules\Responders\Request\GenericUseCaseListItemResponseGeneratorRequest;
use OpenClassrooms\CodeGenerator\Generator\BusinessRules\Responders\Request\GenericUseCaseListItemResponseGeneratorRequestBuilder;

/**
 * @author Samuel Gomis <samuel.gomis@external.openclassrooms.com>
 */
class GenericUseCaseListItemResponseGeneratorRequestBuilderImpl implements GenericUseCaseListItemResponseGeneratorRequestBuilder
{
    /**
     * @var GenericUseCaseListItemResponseGeneratorRequestDTO
     */
    private $request;

    public function create(): GenericUseCaseListItemResponseGeneratorRequestBuilder
    {
        $this->request = new GenericUseCaseListItemResponseGeneratorRequestDTO();

        return $this;
    }

    public function withEntity(string $defaultValue): GenericUseCaseListItemResponseGeneratorRequestBuilder
    {
        $this->request->defaultValue = $defaultValue;

        return $this;
    }

    public function build(): GenericUseCaseListItemResponseGeneratorRequest
    {
        return $this->request;
    }
}
