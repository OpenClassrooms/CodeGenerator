<?php declare(strict_types=1);

namespace OpenClassrooms\CodeGenerator\Generator\Tests\Doubles\Api\ViewModels\DTO\Request;

use OpenClassrooms\CodeGenerator\Generator\Tests\Doubles\Api\ViewModels\Request\ViewModelStubGeneratorRequest;
use OpenClassrooms\CodeGenerator\Generator\Tests\Doubles\Api\ViewModels\Request\ViewModelStubGeneratorRequestBuilder;

/**
 * @author Samuel Gomis <gomis.samuel@external.openclassrooms.com>
 */
class ViewModelStubGeneratorRequestBuilderImpl implements ViewModelStubGeneratorRequestBuilder
{
    /**
     * @var ViewModelStubGeneratorRequestDTO
     */
    private $request;

    public function build(): ViewModelStubGeneratorRequest
    {
        return $this->request;
    }

    public function create(): ViewModelStubGeneratorRequestBuilder
    {
        $this->request = new ViewModelStubGeneratorRequestDTO();

        return $this;
    }

    public function withClassName(string $className): ViewModelStubGeneratorRequestBuilder
    {
        $this->request->className = $className;

        return $this;
    }
}
