<?php declare(strict_types=1);

namespace OpenClassrooms\CodeGenerator\Tests\Fixtures\Classes\tests\Doubles\BusinessRules\Responders\Domain\SubDomain;

use OpenClassrooms\CodeGenerator\Tests\Fixtures\Classes\BusinessRules\Responders\Domain\SubDomain\FunctionalEntityListItemResponse;
use PHPUnit\Framework\Assert;

/**
 * @author Samuel Gomis <gomis.samuel@external.openclassrooms.com>
 */
trait FunctionalEntityListItemResponseTestCase
{
    use FunctionalEntityResponseTestCase;

    /**
     * @param FunctionalEntityListItemResponse[] $expected
     * @param FunctionalEntityListItemResponse[] $actual
     */
    protected function assertFunctionalEntityListItemResponses(array $expected, array $actual): void
    {
        Assert::assertCount(count($expected), $actual);
        foreach ($expected as $key => $item) {
            $this->assertFunctionalEntityListItemResponse($item, $actual[$key]);
        }
    }

    private function assertFunctionalEntityListItemResponse(
        FunctionalEntityListItemResponse $expected,
        FunctionalEntityListItemResponse $actual
    ): void
    {
        $this->assertFunctionalEntityResponse($expected, $actual);
    }
}
