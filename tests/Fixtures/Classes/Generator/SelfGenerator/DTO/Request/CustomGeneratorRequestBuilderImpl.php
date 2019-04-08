<?php declare(strict_types=1);

namespace OpenClassrooms\CodeGenerator\Generator\SelfGenerator\DTO\Request;

use OpenClassrooms\CodeGenerator\Generator\SelfGenerator\Request\CustomGeneratorRequest;
use OpenClassrooms\CodeGenerator\Generator\SelfGenerator\Request\CustomGeneratorRequestBuilder;

/**
 * @author authorStub <author.stub@example.com>
 */
class CustomGeneratorRequestBuilderImpl implements CustomGeneratorRequestBuilder
{
    /**
     * @var CustomGeneratorRequestDTO
     */
    private $request;

    public function create(): CustomGeneratorRequestBuilder
    {
        $this->request = new CustomGeneratorRequestDTO();

        return $this;
    }

    public function withDefaultValue(string $defaultValue): CustomGeneratorRequestBuilder
    {
        $this->request->defaultValue = $defaultValue;

        return $this;
    }

    public function build(): CustomGeneratorRequest
    {
        return $this->request;
    }
}
