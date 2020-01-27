<?php

declare(strict_types=1);

namespace OpenClassrooms\CodeGenerator\Tests\Utility;

use OpenClassrooms\CodeGenerator\Utility\ModelFieldUtility;
use PHPUnit\Framework\TestCase;

final class ModelFieldUtilityTest extends TestCase
{
    /**
     * @test
     */
    public function generateModelFieldObjectsThrowException(): void
    {
        $actuals = ModelFieldUtility::generateModelFieldObjects(ModelFieldUtilityEntityFixtureWithBadDocComment::class);
        $actual = array_shift($actuals);
        $this->assertSame("/**
     * @var abcde
     */", $actual->getDocComment());
    }

    /**
     * @test
     * @dataProvider modelFieldObjectsProvider
     */
    public function generateModelFieldObjectsReturnFieldObjects(string $docCommentExpected, int $expectedKey): void
    {
        $actuals = ModelFieldUtility::generateModelFieldObjects(ModelFieldUtilityEntityFixture::class);
        $this->assertSame($docCommentExpected, $actuals[$expectedKey]->getDocComment());
    }

    public function modelFieldObjectsProvider()
    {
        return [
            [
                '/**
     * @var string
     *
     * @Assert\NotBlank
     * @Assert\Type("string")
     */',
                0,
            ],
            [
                '/**
     * @var string[]
     *
     * @Assert\Type("array")
     */',
                1,
            ],
            [
                '/**
     * @var bool
     *
     * @Assert\NotNull
     * @Assert\Type("bool")
     */',
                2,
            ],
            [
                '/**
     * @var \DateTimeInterface
     *
     * @Assert\NotBlank
     * @Assert\DateTime(format="Y-m-d\TH:i:sO")
     */',
                3,
            ],
            [
                '/**
     * @var int
     *
     * @Assert\NotBlank
     * @Assert\Type("integer")
     */',
                4,
            ],
        ];
    }
}

abstract class ModelFieldUtilityEntityFixture
{
    /**
     * @var string
     */
    protected $field1;

    /**
     * @var string[]
     */
    protected $field2;

    /**
     * @var bool
     */
    protected $field3;

    /**
     * @var \DateTimeInterface
     */
    protected $field4;

    /**
     * @var int
     */
    protected $field5;
}

abstract class ModelFieldUtilityEntityFixtureWithBadDocComment
{
    /**
     * @var abcde
     */
    protected $field5;
}
