<?php declare(strict_types=1);

namespace OpenClassrooms\CodeGenerator\Generator\BusinessRules\Responders\DTO\Request;

use OpenClassrooms\CodeGenerator\Generator\BusinessRules\Responders\Request\UseCaseListItemResponseGeneratorRequest;
use OpenClassrooms\CodeGenerator\Generator\BusinessRules\Responders\Request\UseCaseListItemResponseGeneratorRequestBuilder;

class UseCaseListItemResponseGeneratorRequestBuilderImpl implements UseCaseListItemResponseGeneratorRequestBuilder
{
    /**
     * @var UseCaseListItemResponseGeneratorRequestDTO
     */
    private $request;

    public function build(): UseCaseListItemResponseGeneratorRequest
    {
        return $this->request;
    }

    public function create(): UseCaseListItemResponseGeneratorRequestBuilder
    {
        $this->request = new UseCaseListItemResponseGeneratorRequestDTO();

        return $this;
    }

    public function withEntityClassName(string $entity): UseCaseListItemResponseGeneratorRequestBuilder
    {
        $this->request->entity = $entity;

        return $this;
    }
}
