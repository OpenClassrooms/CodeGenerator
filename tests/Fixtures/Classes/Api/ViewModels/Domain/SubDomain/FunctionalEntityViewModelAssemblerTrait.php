<?php declare(strict_types=1);
// Auto Generated by OpenClassrooms Code Generator

namespace OpenClassrooms\CodeGenerator\Tests\Fixtures\Classes\Api\ViewModels\Domain\SubDomain;

use OpenClassrooms\CodeGenerator\Tests\Fixtures\Classes\BusinessRules\Responders\Domain\SubDomain\FunctionalEntityResponse;

trait FunctionalEntityViewModelAssemblerTrait
{
    public function hydrateCommonFields(FunctionalEntityViewModel $vm, FunctionalEntityResponse $functionalEntity): void
    {
        $vm->id = $functionalEntity->getId();
        $vm->field1 = $functionalEntity->getField1();
        $vm->field2 = $functionalEntity->getField2();
        $vm->field3 = $functionalEntity->isField3();
    }
}