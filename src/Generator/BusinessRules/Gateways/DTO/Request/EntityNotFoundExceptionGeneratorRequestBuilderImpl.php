<?php declare(strict_types=1);

namespace OpenClassrooms\CodeGenerator\Generator\BusinessRules\Gateways\DTO\Request;

use OpenClassrooms\CodeGenerator\Generator\BusinessRules\Gateways\Request\EntityNotFoundExceptionGeneratorRequest;
use OpenClassrooms\CodeGenerator\Generator\BusinessRules\Gateways\Request\EntityNotFoundExceptionGeneratorRequestBuilder;

/**
 * @author Samuel Gomis <samuel.gomis@external.openclassrooms.com>
 */
class EntityNotFoundExceptionGeneratorRequestBuilderImpl implements EntityNotFoundExceptionGeneratorRequestBuilder
{
    /**
     * @var EntityNotFoundExceptionGeneratorRequestDTO
     */
    private $request;

    public function create(): EntityNotFoundExceptionGeneratorRequestBuilder
    {
        $this->request = new EntityNotFoundExceptionGeneratorRequestDTO();

        return $this;
    }

    public function withEntityClassName(string $entity): EntityNotFoundExceptionGeneratorRequestBuilder
    {
        $this->request->entity = $entity;

        return $this;
    }

    public function build(): EntityNotFoundExceptionGeneratorRequest
    {
        return $this->request;
    }
}
