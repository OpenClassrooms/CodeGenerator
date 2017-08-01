<?php

namespace OpenClassrooms\CodeGenerator\Tests\Doubles\src\BusinessRules\Responders\Domain\SubDomain;

//use OpenClassrooms\UseCase\BusinessRules\Responders\UseCaseResponse;

/**
 * @author Romain Kuzniak <romain.kuzniak@openclassrooms.com>
 */
interface EntityResponse //extends UseCaseResponse
{
    public function getId(): int;

    public function getField1(): string;

    public function getField2(): array;

    public function isField3();

}
