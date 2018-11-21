<?php declare(strict_types=1);

namespace OpenClassrooms\CodeGenerator\Tests\Fixtures\Classes\Api\ViewModels\Domain\SubDomain;

use OpenClassrooms\CodeGenerator\Tests\Fixtures\Classes\BusinessRules\Responders\Domain\SubDomain\FunctionalEntityListItemResponse;

/**
 * @author authorStub <author.stub@example.com>
 */
interface FunctionalEntityListItemAssembler
{
    /**
     * @param FunctionalEntityListItemResponse[] $functionalEntities
     *
     * @return FunctionalEntityListItem[]
     */
    public function createListItems(array $functionalEntities);
}
