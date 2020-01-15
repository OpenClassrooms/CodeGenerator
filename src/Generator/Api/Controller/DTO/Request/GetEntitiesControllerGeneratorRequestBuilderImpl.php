<?php declare(strict_types=1);

namespace OpenClassrooms\CodeGenerator\Generator\Api\Controller\DTO\Request;

use OpenClassrooms\CodeGenerator\Generator\Api\Controller\Request\GetEntitiesControllerGeneratorRequest;
use OpenClassrooms\CodeGenerator\Generator\Api\Controller\Request\GetEntitiesControllerGeneratorRequestBuilder;

class GetEntitiesControllerGeneratorRequestBuilderImpl implements GetEntitiesControllerGeneratorRequestBuilder
{
    /**
     * @var GetEntitiesControllerGeneratorRequestDTO
     */
    private $request;

    public function create(): GetEntitiesControllerGeneratorRequestBuilder
    {
        $this->request = new GetEntitiesControllerGeneratorRequestDTO();

        return $this;
    }

    public function withEntityClassName(string $entityClassName): GetEntitiesControllerGeneratorRequestBuilder
    {
        $this->request->entityClassName = $entityClassName;

        return $this;
    }

    public function build(): GetEntitiesControllerGeneratorRequest
    {
        return $this->request;
    }
}
