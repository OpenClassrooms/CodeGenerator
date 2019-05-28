<?php declare(strict_types=1);

namespace OpenClassrooms\CodeGenerator\Tests\Utility;

use OpenClassrooms\CodeGenerator\Tests\Fixtures\Classes\Api\ViewModels\Domain\SubDomain\FunctionalEntityDetail;
use OpenClassrooms\CodeGenerator\Tests\Fixtures\Classes\Api\ViewModels\Domain\SubDomain\FunctionalEntityListItem;
use OpenClassrooms\CodeGenerator\Utility\FileObjectUtility;
use OpenClassrooms\CodeGenerator\Utility\TestUtility;
use PHPUnit\Framework\TestCase;

/**
 * @author Samuel Gomis <samuel.gomis@external.openclassrooms.com>
 */
class TestUtilityTest extends TestCase
{
    /**
     * @test
     * @dataProvider getTestCaseAssertMethodDataProvider
     */
    public function getTestCaseAssertMethod_ReturnString(string $shortName, string $expectedMethod)
    {
        $actualMethod = TestUtility::buildTestCaseAssertMethodName($shortName);

        $this->assertEquals($expectedMethod, $actualMethod);
    }

    public function getTestCaseAssertMethodDataProvider()
    {
        return [
            [FileObjectUtility::getShortClassName(FunctionalEntityDetail::class), 'assertFunctionalEntityDetail'],
            [FileObjectUtility::getShortClassName(FunctionalEntityListItem::class), 'assertFunctionalEntityListItems'],
        ];
    }
}
