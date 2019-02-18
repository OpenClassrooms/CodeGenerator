<?php declare(strict_types=1);

namespace OpenClassrooms\CodeGenerator\Tests\Fixtures\Classes\BusinessRules\UseCases\Domain\SubDomain\DTO\Request;

use OpenClassrooms\CodeGenerator\Tests\Fixtures\Classes\BusinessRules\Requestors\Domain\SubDomain\GetFunctionalEntityRequest;
use OpenClassrooms\CodeGenerator\Tests\Fixtures\Classes\BusinessRules\Requestors\Domain\SubDomain\GetFunctionalEntityRequestBuilder;

/**
 * @author authorStub <author.stub@example.com>
 */
class GetFunctionalEntityRequestBuilderImpl implements GetFunctionalEntityRequestBuilder
{
    /**
     * @var GetFunctionalEntityRequestDTO
     */
    private $request;

    public function create(): GetFunctionalEntityRequestBuilder
    {
        $this->request = new GetFunctionalEntityRequestDTO();

        return $this;
    }

    public function build(): GetFunctionalEntityRequest
    {
        return $this->request;
    }
}
