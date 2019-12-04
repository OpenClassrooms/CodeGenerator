<?php declare(strict_types=1);

namespace OpenClassrooms\CodeGenerator\Generator\App\Entity\DTO\Request;

use OpenClassrooms\CodeGenerator\Generator\App\Entity\Request\EntityImplGeneratorRequest;
use OpenClassrooms\CodeGenerator\Generator\App\Entity\Request\EntityImplGeneratorRequestBuilder;

class EntityImplGeneratorRequestBuilderImpl implements EntityImplGeneratorRequestBuilder
{
    /**
     * @var EntityImplGeneratorRequestDTO
     */
    private $request;

    public function build(): EntityImplGeneratorRequest
    {
        return $this->request;
    }

    public function create(): EntityImplGeneratorRequestBuilder
    {
        $this->request = new EntityImplGeneratorRequestDTO();

        return $this;
    }

    public function withClassName(string $className): EntityImplGeneratorRequestBuilder
    {
        $this->request->className = $className;

        return $this;
    }
}
