<?php declare(strict_types=1);

namespace OpenClassrooms\CodeGenerator\Tests\Fixtures\Classes\Api\ViewModels\Domain\SubDomain\Impl;

use OpenClassrooms\CodeGenerator\Tests\Fixtures\Classes\Api\ViewModels\Domain\SubDomain\FunctionalEntityAssemblerTrait;
use OpenClassrooms\CodeGenerator\Tests\Fixtures\Classes\Api\ViewModels\Domain\SubDomain\FunctionalEntityListItemAssembler;
use OpenClassrooms\CodeGenerator\Tests\Fixtures\Classes\BusinessRules\Responders\Domain\SubDomain\FunctionalEntityResponse;

/**
 * @author Samuel Gomis <gomis.samuel@external.openclassrooms.com>
 */
class FunctionalEntityListItemAssemblerImpl implements FunctionalEntityListItemAssembler
{
    use FunctionalEntityAssemblerTrait;

    /**
     * @return FunctionalEntityListItemImpl
     */
    private function createListItem(FunctionalEntityResponse $functionalEntity)
    {
        $vm = new FunctionalEntityListItemImpl();
        $this->hydrateCommonFields($vm, $functionalEntity);

        return $vm;
    }

    /**
     * @inheritdoc
     */
    public function createListItems(array $functionalEntities)
    {
        $vms = [];
        foreach ($functionalEntities as $functionalEntity) {
            $vms[] = $this->createListItem($functionalEntity);
        }

        return $vms;
    }
}
