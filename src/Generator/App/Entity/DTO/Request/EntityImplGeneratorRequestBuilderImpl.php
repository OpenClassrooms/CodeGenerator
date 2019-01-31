<?php declare(strict_types=1);

namespace OpenClassrooms\CodeGenerator\Generator\App\Entity\DTO\Request;

use OpenClassrooms\CodeGenerator\Generator\App\Entity\Request\EntityImplGeneratorRequest;
use OpenClassrooms\CodeGenerator\Generator\App\Entity\Request\EntityImplGeneratorRequestBuilder;

/**
 * @author Samuel Gomis <samuel.gomis@external.openclassrooms.com>
 */
class EntityImplGeneratorRequestBuilderImpl implements EntityImplGeneratorRequestBuilder
{
    /**
     * @var EntityImplGeneratorRequestDTO
     */
    private $request;

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

    public function build(): EntityImplGeneratorRequest
    {
        return $this->request;
    }
}
