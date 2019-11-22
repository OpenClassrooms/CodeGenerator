<?php declare(strict_types=1);

namespace OpenClassrooms\CodeGenerator\Generator\BusinessRules\Requestors\DTO\Request;

use OpenClassrooms\CodeGenerator\Generator\BusinessRules\Requestors\Request\EditEntityUseCaseRequestGeneratorRequest;
use OpenClassrooms\CodeGenerator\Generator\BusinessRules\Requestors\Request\EditEntityUseCaseRequestGeneratorRequestBuilder;

class EditEntityUseCaseRequestGeneratorRequestBuilderImpl implements EditEntityUseCaseRequestGeneratorRequestBuilder
{
    /**
     * @var EditEntityUseCaseRequestGeneratorRequestDTO
     */
    private $request;

    public function create(): EditEntityUseCaseRequestGeneratorRequestBuilder
    {
        $this->request = new EditEntityUseCaseRequestGeneratorRequestDTO();

        return $this;
    }

    public function withEntityClassName(string $entityClassName): EditEntityUseCaseRequestGeneratorRequestBuilder
    {
        $this->request->entityClassName = $entityClassName;

        return $this;
    }

    public function build(): EditEntityUseCaseRequestGeneratorRequest
    {
        return $this->request;
    }
}