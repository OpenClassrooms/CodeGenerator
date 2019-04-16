<?php declare(strict_types=1);

namespace OpenClassrooms\CodeGenerator\Generator\BusinessRules\Responders\DTO\Request;

use OpenClassrooms\CodeGenerator\Generator\BusinessRules\Responders\Request\GenericUseCaseDetailResponseAssemblerGeneratorRequest;
use OpenClassrooms\CodeGenerator\Generator\BusinessRules\Responders\Request\GenericUseCaseDetailResponseAssemblerGeneratorRequestBuilder;

/**
 * @author Samuel Gomis <samuel.gomis@external.openclassrooms.com>
 */
class GenericUseCaseDetailResponseAssemblerGeneratorRequestBuilderImpl implements GenericUseCaseDetailResponseAssemblerGeneratorRequestBuilder
{
    /**
     * @var GenericUseCaseDetailResponseAssemblerGeneratorRequestDTO
     */
    private $request;

    public function create(): GenericUseCaseDetailResponseAssemblerGeneratorRequestBuilder
    {
        $this->request = new GenericUseCaseDetailResponseAssemblerGeneratorRequestDTO();

        return $this;
    }

    public function withEntity(string $entity): GenericUseCaseDetailResponseAssemblerGeneratorRequestBuilder
    {
        $this->request->entity = $entity;

        return $this;
    }

    public function build(): GenericUseCaseDetailResponseAssemblerGeneratorRequest
    {
        return $this->request;
    }
}
