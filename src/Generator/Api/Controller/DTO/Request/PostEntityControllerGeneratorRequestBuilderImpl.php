<?php declare(strict_types=1);

namespace OpenClassrooms\CodeGenerator\Generator\Api\Controller\DTO\Request;

use OpenClassrooms\CodeGenerator\Generator\Api\Controller\Request\PostEntityControllerGeneratorRequest;
use OpenClassrooms\CodeGenerator\Generator\Api\Controller\Request\PostEntityControllerGeneratorRequestBuilder;

class PostEntityControllerGeneratorRequestBuilderImpl implements PostEntityControllerGeneratorRequestBuilder
{
    /**
     * @var PostEntityControllerGeneratorRequestDTO
     */
    private $request;

    public function create(): PostEntityControllerGeneratorRequestBuilder
    {
        $this->request = new PostEntityControllerGeneratorRequestDTO();

        return $this;
    }

    public function withEntityClassName(string $entityClassName): PostEntityControllerGeneratorRequestBuilder
    {
        $this->request->entityClassName = $entityClassName;

        return $this;
    }

    public function build(): PostEntityControllerGeneratorRequest
    {
        return $this->request;
    }
}
