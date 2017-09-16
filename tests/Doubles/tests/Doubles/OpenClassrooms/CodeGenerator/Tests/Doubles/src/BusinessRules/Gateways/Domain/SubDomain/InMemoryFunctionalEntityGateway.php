<?php

namespace OpenClassrooms\CodeGenerator\Tests\Doubles\tests\Doubles\OpenClassrooms\CodeGenerator\Tests\Doubles\src\BusinessRules\Gateways\Domain\SubDomain;

use OpenClassrooms\CodeGenerator\Tests\Doubles\src\BusinessRules\Gateways\Domain\SubDomain\FunctionalEntityGateway;
use OpenClassrooms\CodeGenerator\Tests\Doubles\src\BusinessRules\Gateways\Domain\SubDomain\FunctionalEntityNotFoundException;

/**
 * @author Romain Kuzniak <romain.kuzniak@openclassrooms.com>
 */
class InMemoryFunctionalEntityGateway implements FunctionalEntityGateway
{
    /**
     * @var \OpenClassrooms\CodeGenerator\Tests\Doubles\src\BusinessRules\Entities\Domain\SubDomain\FunctionalEntity[]
     */
    public static $functionalEntities = [];

    public function __construct(array $functionalEntities = [])
    {
        self::$functionalEntities = $functionalEntities;
    }

    /**
     * {@inheritdoc}
     */
    public function find($id)
    {
        if (array_key_exists($id, self::$functionalEntities)) {
            return self::$functionalEntities[$id];
        }

        throw new FunctionalEntityNotFoundException($id);
    }
}
