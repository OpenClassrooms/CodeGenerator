<?php declare(strict_types=1);
// Auto Generated by OpenClassrooms Code Generator

namespace OpenClassrooms\CodeGenerator\Tests\Fixtures\Classes\Api\ViewModels\Domain\SubDomain;

use OpenClassrooms\CodeGenerator\Tests\Fixtures\Classes\BusinessRules\Responders\Domain\SubDomain\FunctionalEntityResponse;

/**
 * @author Samuel Gomis <gomis.samuel@external.openclassrooms.com>
 */
interface FunctionalEntityAssembler
{
    public function create(FunctionalEntityResponse $entity): FunctionalEntity;
}