<?php

// Auto Generated by OpenClassrooms Code Generator

declare(strict_types=1);

namespace OpenClassrooms\CodeGenerator\Tests\Fixtures\Classes\Api\ViewModels\Domain\SubDomain;

use OC\BusinessRules\Utils\DtoCommonFieldsHydrator;
use OpenClassrooms\CodeGenerator\Tests\Fixtures\Classes\BusinessRules\Responders\Domain\SubDomain\FunctionalEntityListItemResponse;
use OpenClassrooms\CodeGenerator\Tests\Fixtures\Classes\BusinessRules\Responders\Domain\SubDomain\FunctionalEntityResponse;

class FunctionalEntityViewModelListItemAssembler
{
    /**
     * @param FunctionalEntityListItemResponse[] $functionalEntities
     *
     * @return FunctionalEntityViewModelListItem[]
     */
    public function createListItems(array $functionalEntities): array
    {
        $vms = [];
        foreach ($functionalEntities as $functionalEntity) {
            $vms[] = $this->createListItem($functionalEntity);
        }

        return $vms;
    }

    private function createListItem(FunctionalEntityResponse $functionalEntity): FunctionalEntityViewModelListItem
    {
        $vm = new FunctionalEntityViewModelListItem();
        DtoCommonFieldsHydrator::hydrate($vm, $functionalEntity);

        return $vm;
    }
}
