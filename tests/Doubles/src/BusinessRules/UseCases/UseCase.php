<?php

namespace OpenClassrooms\CodeGenerator\Tests\Doubles\src\BusinessRules\UseCases;

use OpenClassrooms\CodeGenerator\Tests\Doubles\src\BusinessRules\Requestors\UseCaseRequest;

/**
 * @author Romain Kuzniak <romain.kuzniak@openclassrooms.com>
 */
interface UseCase
{
    public function execute(UseCaseRequest $useCaseRequest);
}
