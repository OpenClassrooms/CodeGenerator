<?php declare(strict_types=1);

namespace OpenClassrooms\CodeGenerator\Generator\App\Repository\DTO\Request;

use OpenClassrooms\CodeGenerator\Generator\App\Repository\Request\EntityRepositoryGeneratorRequest;
use OpenClassrooms\CodeGenerator\Generator\App\Repository\Request\EntityRepositoryGeneratorRequestBuilder;

/**
 * @author Samuel Gomis <samuel.gomis@external.openclassrooms.com>
 */
class EntityRepositoryGeneratorRequestBuilderImpl implements EntityRepositoryGeneratorRequestBuilder
{
    /**
     * @var EntityRepositoryGeneratorRequestDTO
     */
    private $request;

    public function create(): EntityRepositoryGeneratorRequestBuilder
    {
        $this->request = new EntityRepositoryGeneratorRequestDTO();

        return $this;
    }

    public function withEntity(string $entity): EntityRepositoryGeneratorRequestBuilder
    {
        $this->request->entity = $entity;

        return $this;
    }

    public function build(): EntityRepositoryGeneratorRequest
    {
        return $this->request;
    }
}
