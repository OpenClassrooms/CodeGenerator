<?php declare(strict_types=1);

namespace OpenClassrooms\CodeGenerator\Tests\Utility;

use OpenClassrooms\CodeGenerator\Tests\Fixtures\Classes\BusinessRules\Entities\Domain\SubDomain\FunctionalEntity;
use OpenClassrooms\CodeGenerator\Utility\ModelFieldUtility;
use PHPUnit\Framework\TestCase;

final class ModelFieldUtilityTest extends TestCase
{
    /**
     * @test
     * @dataProvider modelFieldObjectsProvider
     */
    public function generateModelFieldObjectsReturnFieldObjects(string $docCommentExpected, int $expectedKey): void
    {
        $actuals = ModelFieldUtility::generateModelFieldObjects(FunctionalEntity::class);
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
        ];
    }
}
