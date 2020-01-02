<?php declare(strict_types=1);

namespace OpenClassrooms\CodeGenerator\Generator\Api\Controller\DTO\Request;

use OpenClassrooms\CodeGenerator\Generator\Api\Controller\Request\DeleteEntityControllerGeneratorRequest;
use OpenClassrooms\CodeGenerator\Generator\Api\Controller\Request\DeleteEntityControllerGeneratorRequestBuilder;

class DeleteEntityControllerGeneratorRequestBuilderImpl implements DeleteEntityControllerGeneratorRequestBuilder
{
    /**
     * @var DeleteEntityControllerGeneratorRequestDTO
     */
    private $request;

    public function create(): DeleteEntityControllerGeneratorRequestBuilder
    {
        $this->request = new DeleteEntityControllerGeneratorRequestDTO();

        return $this;
    }

    public function withEntityClassName(string $entityClassName): DeleteEntityControllerGeneratorRequestBuilder
    {
        $this->request->entityClassName = $entityClassName;

        return $this;
    }

    public function build(): DeleteEntityControllerGeneratorRequest
    {
        return $this->request;
    }
}
