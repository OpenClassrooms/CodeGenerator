<?php declare(strict_types=1);

namespace OpenClassrooms\CodeGenerator\Tests\Fixtures\Classes\BusinessRules\Entities\Domain\SubDomain;

interface FunctionalEntityFactory
{
    /**
     * @return FunctionalEntity
     */
    public function create();
}
