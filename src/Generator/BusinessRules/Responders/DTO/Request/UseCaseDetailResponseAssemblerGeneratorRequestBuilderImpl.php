<?php declare(strict_types=1);

namespace OpenClassrooms\CodeGenerator\Generator\BusinessRules\Responders\DTO\Request;

use OpenClassrooms\CodeGenerator\Generator\BusinessRules\Responders\Request\UseCaseDetailResponseAssemblerGeneratorRequest;
use OpenClassrooms\CodeGenerator\Generator\BusinessRules\Responders\Request\UseCaseDetailResponseAssemblerGeneratorRequestBuilder;

/**
 * @author Samuel Gomis <samuel.gomis@external.openclassrooms.com>
 */
class UseCaseDetailResponseAssemblerGeneratorRequestBuilderImpl implements UseCaseDetailResponseAssemblerGeneratorRequestBuilder
{
    /**
     * @var UseCaseDetailResponseAssemblerGeneratorRequestDTO
     */
    private $request;

    public function create(): UseCaseDetailResponseAssemblerGeneratorRequestBuilder
    {
        $this->request = new UseCaseDetailResponseAssemblerGeneratorRequestDTO();

        return $this;
    }

    public function withEntity(string $entity): UseCaseDetailResponseAssemblerGeneratorRequestBuilder
    {
        $this->request->entity = $entity;

        return $this;
    }

    public function build(): UseCaseDetailResponseAssemblerGeneratorRequest
    {
        return $this->request;
    }
}
