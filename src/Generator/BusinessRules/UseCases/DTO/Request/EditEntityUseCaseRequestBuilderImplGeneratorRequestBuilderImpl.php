<?php declare(strict_types=1);

namespace OpenClassrooms\CodeGenerator\Generator\BusinessRules\UseCases\DTO\Request;

use OpenClassrooms\CodeGenerator\Generator\BusinessRules\UseCases\Request\EditEntityUseCaseRequestBuilderImplGeneratorRequest;
use OpenClassrooms\CodeGenerator\Generator\BusinessRules\UseCases\Request\EditEntityUseCaseRequestBuilderImplGeneratorRequestBuilder;

class EditEntityUseCaseRequestBuilderImplGeneratorRequestBuilderImpl implements EditEntityUseCaseRequestBuilderImplGeneratorRequestBuilder
{
    /**
     * @var EditEntityUseCaseRequestBuilderImplGeneratorRequestDTO
     */
    private $request;

    public function create(): EditEntityUseCaseRequestBuilderImplGeneratorRequestBuilder
    {
        $this->request = new EditEntityUseCaseRequestBuilderImplGeneratorRequestDTO();

        return $this;
    }

    public function withEntityClassName(string $entityClassName): EditEntityUseCaseRequestBuilderImplGeneratorRequestBuilder
    {
        $this->request->entityClassName = $entityClassName;

        return $this;
    }

    public function build(): EditEntityUseCaseRequestBuilderImplGeneratorRequest
    {
        return $this->request;
    }
}
