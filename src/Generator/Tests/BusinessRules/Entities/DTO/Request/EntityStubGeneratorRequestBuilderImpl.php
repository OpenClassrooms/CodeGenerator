<?php declare(strict_types=1);

namespace OpenClassrooms\CodeGenerator\Generator\Tests\BusinessRules\Entities\DTO\Request;

use OpenClassrooms\CodeGenerator\Generator\Tests\BusinessRules\Entities\Request\EntityStubGeneratorRequest;
use OpenClassrooms\CodeGenerator\Generator\Tests\BusinessRules\Entities\Request\EntityStubGeneratorRequestBuilder;

/**
 * @author Samuel Gomis <gomis.samuel@external.openclassrooms.com>
 */
class EntityStubGeneratorRequestBuilderImpl implements EntityStubGeneratorRequestBuilder
{
    /**
     * @var EntityStubGeneratorRequestDTO
     */
    private $request;

    public function build(): EntityStubGeneratorRequest
    {
        return $this->request;
    }

    public function create(): EntityStubGeneratorRequestBuilder
    {
        $this->request = new EntityStubGeneratorRequestDTO();

        return $this;
    }

    public function withClassName(string $className): EntityStubGeneratorRequestBuilder
    {
        $this->request->className = $className;

        return $this;
    }
}
