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
        $this->assertSame(
            "/**
     * @var abcde
     */",
            $actual->getDocComment()
        );
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
     * @Assert\NotNull
     * @Assert\Type("bool")
     */',
                2,
            ],
            [
                '/**
     * @Assert\NotBlank
     * @Assert\DateTime(format="Y-m-d\TH:i:sO")
     */',
                3,
            ],
            [
                '/**
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
    protected string $field1;

    /**
     * @var string[]
     */
    protected array $field2;

    protected bool $field3;

    protected \DateTimeInterface $field4;

    protected int $field5;
}

abstract class ModelFieldUtilityEntityFixtureWithBadDocComment
{
    /**
     * @var abcde
     */
    protected $field5;
}
