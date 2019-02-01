<?php declare(strict_types=1);

namespace OpenClassrooms\CodeGenerator\SkeletonModels\Api\ViewModels\Impl;

use OpenClassrooms\CodeGenerator\Tests\TestClassUtil;
use PHPUnit\Framework\TestCase;

/**
 * @author Samuel Gomis <gomis.samuel@external.openclassrooms.com>
 */
class SkeletonAssemblerUtilityTest extends TestCase
{
    /**
     * @var SkeletonAssemblerUtility
     */
    private $skeletonAssemblerUtilityMock;

    /**
     * @test
     * @dataProvider shortNameProvider
     */
    public function getUseCaseListItemResponseArgument_ReturnString($shortName, $expected)
    {
        $actual = TestClassUtil::invokeMethod(
            'getUseCaseListItemResponseArgument',
            $this->skeletonAssemblerUtilityMock,
            $shortName
        );

        $this->assertEquals($actual, $expected);
    }

    public function shortNameProvider()
    {
        return [
            ['Entity','entities'],
            ['Object','objects'],
        ];
    }

    protected function setUp()
    {
        $this->skeletonAssemblerUtilityMock = $this->getMockForTrait(SkeletonAssemblerUtility::class);
    }
}
