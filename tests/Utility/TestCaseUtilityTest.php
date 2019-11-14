<?php declare(strict_types=1);

namespace OpenClassrooms\CodeGenerator\Tests\Utility;

use Generator;
use OpenClassrooms\CodeGenerator\Tests\Fixtures\Classes\Api\ViewModels\Domain\SubDomain\FunctionalEntityViewModelDetail;
use OpenClassrooms\CodeGenerator\Tests\Fixtures\Classes\Api\ViewModels\Domain\SubDomain\FunctionalEntityViewModelListItem;
use OpenClassrooms\CodeGenerator\Tests\Fixtures\Classes\Tests\Doubles\Api\ViewModels\Domain\SubDomain\FunctionalEntityViewModelDetailTestCase;
use OpenClassrooms\CodeGenerator\Tests\Fixtures\Classes\Tests\Doubles\Api\ViewModels\Domain\SubDomain\FunctionalEntityViewModelListItemTestCase;
use OpenClassrooms\CodeGenerator\Utility\FileObjectUtility;
use OpenClassrooms\CodeGenerator\Utility\TestCaseUtility;
use PHPUnit\Framework\TestCase;

/**
 * @author Samuel Gomis <samuel.gomis@external.openclassrooms.com>
 */
final class TestCaseUtilityTest extends TestCase
{
    public function getTestCaseAssertMethodDataProvider(): Generator
    {
        yield[
            FileObjectUtility::getShortClassName(FunctionalEntityViewModelDetailTestCase::class),
            'assertFunctionalEntityViewModelDetail',
        ];
        yield[
            FileObjectUtility::getShortClassName(FunctionalEntityViewModelListItemTestCase::class),
            'assertFunctionalEntityViewModelListItems',
        ];
        yield[
            FileObjectUtility::getShortClassName(FunctionalEntityViewModelDetail::class),
            'assertFunctionalEntityViewModelDetail',
        ];

        yield [
            FileObjectUtility::getShortClassName(FunctionalEntityViewModelListItem::class),
            'assertFunctionalEntityViewModelListItems',
        ];
    }

    /**
     * @test
     * @dataProvider getTestCaseAssertMethodDataProvider
     */
    public function getTestCaseAssertMethodReturnString(string $shortName, string $expectedMethod)
    {
        $actualMethod = TestCaseUtility::buildTestCaseAssertMethodName($shortName);

        $this->assertEquals($expectedMethod, $actualMethod);
    }
}
