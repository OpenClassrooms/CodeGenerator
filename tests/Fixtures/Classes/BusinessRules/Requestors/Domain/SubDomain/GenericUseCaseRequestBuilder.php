<?php declare(strict_types=1);

namespace OpenClassrooms\CodeGenerator\Tests\Fixtures\Classes\BusinessRules\Requestors\Domain\SubDomain;

use OpenClassrooms\UseCase\BusinessRules\Requestors\UseCaseRequest;

/**
 * @author authorStub <author.stub@example.com>
 */
interface GenericUseCaseRequestBuilder extends UseCaseRequest
{
    public function create(): GenericUseCaseRequestBuilder;

    public function build(): GenericUseCaseRequest;
}
