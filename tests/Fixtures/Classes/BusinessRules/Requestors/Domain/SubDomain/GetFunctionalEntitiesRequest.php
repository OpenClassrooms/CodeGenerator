<?php declare(strict_types=1);
// Auto Generated by OpenClassrooms Code Generator

namespace OpenClassrooms\CodeGenerator\Tests\Fixtures\Classes\BusinessRules\Requestors\Domain\SubDomain;

use OpenClassrooms\UseCase\BusinessRules\Requestors\UseCaseRequest;

/**
 * @author authorStub <author.stub@example.com>
 */
interface GetFunctionalEntitiesRequest extends UseCaseRequest
{
    /**
     * @return string[]
     */
    public function getFilters();

    public function getItemsPerPage(): int;

    public function getPage(): int;

    /**
     * @return string[]
     */
    public function getSorts();
}
