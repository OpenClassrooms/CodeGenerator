<?php declare(strict_types=1);
// Auto Generated by OpenClassrooms Code Generator

namespace OpenClassrooms\CodeGenerator\Tests\Fixtures\Classes\Tests\Doubles\Api\ViewModels\Domain\SubDomain;

use OpenClassrooms\CodeGenerator\Tests\Fixtures\Classes\Api\ViewModels\Domain\SubDomain\Impl\FunctionalEntityViewModelListItemImpl;
use OpenClassrooms\CodeGenerator\Tests\Fixtures\Classes\Tests\Doubles\BusinessRules\Responders\Domain\SubDomain\FunctionalEntityListItemResponseStub1;

class FunctionalEntityViewModelListItemStub1 extends FunctionalEntityViewModelListItemImpl
{
    public const FIELD_1 = FunctionalEntityListItemResponseStub1::FIELD_1;

    public const FIELD_2 = FunctionalEntityListItemResponseStub1::FIELD_2;

    public const FIELD_3 = FunctionalEntityListItemResponseStub1::FIELD_3;

    public const ID = FunctionalEntityListItemResponseStub1::ID;

    /**
     * {@inheritdoc}
     */
    public $field1 = self::FIELD_1;

    /**
     * {@inheritdoc}
     */
    public $field2 = self::FIELD_2;

    /**
     * {@inheritdoc}
     */
    public $field3 = self::FIELD_3;

    /**
     * {@inheritdoc}
     */
    public $id = self::ID;
}