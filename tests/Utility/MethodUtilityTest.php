<?php declare(strict_types=1);

namespace OpenClassrooms\CodeGenerator\Tests\Utility;

use OpenClassrooms\CodeGenerator\Tests\Fixtures\Classes\Api\ViewModels\Domain\SubDomain\FunctionalEntityDetail;
use OpenClassrooms\CodeGenerator\Tests\Fixtures\Classes\Api\ViewModels\Domain\SubDomain\FunctionalEntityListItem;
use OpenClassrooms\CodeGenerator\Utility\ClassNameUtility;
use OpenClassrooms\CodeGenerator\Utility\MethodUtility;
use PHPUnit\Framework\TestCase;

/**
 * @author Samuel Gomis <gomis.samuel@external.openclassrooms.com>
 */
class MethodUtilityTest extends TestCase
{
    use ClassNameUtility;

    /**
     * @test
     * @dataProvider getTestCaseAssertMethodDataProvider
     */
    public function getTestCaseAssertMethod_ReturnString(string $shortName, string $expectedMethod)
    {
        $actualMethod = MethodUtility::getTestCaseAssertMethod($shortName);

        $this->assertEquals($expectedMethod, $actualMethod);
    }

    public function getTestCaseAssertMethodDataProvider()
    {
        return [
            [$this->getShortClassName(FunctionalEntityDetail::class), 'assertFunctionalEntityDetail'],
            [$this->getShortClassName(FunctionalEntityListItem::class), 'assertFunctionalEntityListItem'],
        ];
    }
}
