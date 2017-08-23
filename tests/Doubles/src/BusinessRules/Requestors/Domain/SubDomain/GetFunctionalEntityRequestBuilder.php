<?php
// Auto Generated by OpenClassrooms Code Generator

namespace OpenClassrooms\CodeGenerator\Tests\Doubles\src\BusinessRules\Requestors\Domain\SubDomain;

/**
 * @author Romain Kuzniak <romain.kuzniak@openclassrooms.com>
 */
interface GetFunctionalEntityRequestBuilder
{
    public function create(): GetFunctionalEntityRequestBuilder;

    public function withId(int $id): GetFunctionalEntityRequestBuilder;

    public function build(): GetFunctionalEntityRequest;
}
