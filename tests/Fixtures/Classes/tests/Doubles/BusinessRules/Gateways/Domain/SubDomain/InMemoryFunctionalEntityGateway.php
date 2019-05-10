<?php declare(strict_types=1);

namespace OpenClassrooms\CodeGenerator\Tests\Fixtures\Classes\tests\Doubles\BusinessRules\Gateways\Domain\SubDomain;

use OpenClassrooms\CodeGenerator\Tests\Fixtures\Classes\Api\ViewModels\Domain\SubDomain\FunctionalEntity;
use OpenClassrooms\CodeGenerator\Tests\Fixtures\Classes\BusinessRules\Gateways\Domain\SubDomain\Exceptions\FunctionalEntityNotFoundException;
use OpenClassrooms\CodeGenerator\Tests\Fixtures\Classes\BusinessRules\Gateways\Domain\SubDomain\FunctionalEntityGateway;

/**
 * @author Samuel Gomis <gomis.samuel@external.openclassrooms.com>
 */
class InMemoryFunctionalEntityGateway implements FunctionalEntityGateway
{
    /**
     * @var FunctionalEntity[]
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
        if (!isset(self::$functionalEntities[$id])) {
            throw new FunctionalEntityNotFoundException();
        }

        return self::$functionalEntities[$id];
    }

    /**
     * {@inheritdoc}
     */
    public function findAll(array $filters = [], array $sorts = [], array $pagination = [])
    {
        return self::$functionalEntities;
    }
}
