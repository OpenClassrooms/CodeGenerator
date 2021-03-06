<?php

// Auto Generated by OpenClassrooms Code Generator

declare(strict_types=1);

namespace OpenClassrooms\CodeGenerator\Tests\Fixtures\Classes\BusinessRules\UseCases\Domain\SubDomain\DTO\Response;

use OpenClassrooms\CodeGenerator\Tests\Fixtures\Classes\BusinessRules\Entities\Domain\SubDomain\FunctionalEntity;
use OpenClassrooms\CodeGenerator\Tests\Fixtures\Classes\BusinessRules\Responders\Domain\SubDomain\FunctionalEntityResponse;

trait FunctionalEntityResponseAssemblerTrait
{
    private function hydrateCommonFields(FunctionalEntity $entity, FunctionalEntityResponse $response): FunctionalEntityResponse
    {
        $response->field1 = $entity->getField1();
        $response->field2 = $entity->getField2();
        $response->field3 = $entity->isField3();
        $response->id = $entity->getId();

        return $response;
    }
}
