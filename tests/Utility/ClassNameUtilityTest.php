<?php declare(strict_types=1);

namespace OpenClassrooms\CodeGenerator\Utility;

use OpenClassrooms\CodeGenerator\Tests\Fixtures\Classes\Api\ViewModels\Domain\SubDomain\FunctionalEntityDetail;
use OpenClassrooms\CodeGenerator\Tests\Fixtures\Classes\Api\ViewModels\Domain\SubDomain\FunctionalEntityDetailAssembler;
use OpenClassrooms\CodeGenerator\Tests\Fixtures\Classes\Api\ViewModels\Domain\SubDomain\FunctionalEntityListItem;
use OpenClassrooms\CodeGenerator\Tests\Fixtures\Classes\Api\ViewModels\Domain\SubDomain\FunctionalEntityListItemAssembler;
use OpenClassrooms\CodeGenerator\Tests\Fixtures\Classes\App\Entity\Domain\SubDomain\FunctionalEntityImpl;
use OpenClassrooms\CodeGenerator\Tests\Fixtures\Classes\BusinessRules\Responders\Domain\SubDomain\FunctionalEntityDetailResponse;
use OpenClassrooms\CodeGenerator\Tests\Fixtures\Classes\BusinessRules\Responders\Domain\SubDomain\FunctionalEntityListItemResponse;
use OpenClassrooms\CodeGenerator\Tests\Fixtures\Classes\BusinessRules\Responders\Domain\SubDomain\FunctionalEntityResponse;
use OpenClassrooms\CodeGenerator\Tests\Fixtures\Classes\BusinessRules\UseCases\Domain\SubDomain\DTO\Response\FunctionalEntityListItemResponseDTO;
use OpenClassrooms\CodeGenerator\Tests\Fixtures\Classes\BusinessRules\UseCases\Domain\SubDomain\DTO\Response\FunctionalEntityResponseDTO;
use OpenClassrooms\CodeGenerator\Tests\Fixtures\Classes\tests\Doubles\Api\ViewModels\Domain\SubDomain\FunctionalEntityTestCase;
use OpenClassrooms\CodeGenerator\Tests\Fixtures\Classes\tests\Doubles\BusinessRules\Entities\Domain\SubDomain\FunctionalEntityStub1;
use OpenClassrooms\CodeGenerator\Tests\TestClassUtil;
use PHPUnit\Framework\MockObject\MockObject;
use PHPUnit\Framework\TestCase;

/**
 * @author Samuel Gomis <gomis.samuel@external.openclassrooms.com>
 */
class ClassNameUtilityTest extends TestCase
{
    /**
     * @var ClassNameUtility|MockObject
     */
    private $classNameUtilityMock;

    /**
     * @test
     * @dataProvider classNameDataProvider
     */
    public function getDomainAndEntityNameFromClassName_ReturnArray($className, $expectedDomain, $expectedEntity)
    {
        [$actualDomain, $actualEntity] = TestClassUtil::invokeMethod(
            'getDomainAndEntityNameFromClassName',
            $this->classNameUtilityMock,
            $className
        );

        $this->assertEquals($expectedDomain, $actualDomain);
        $this->assertEquals($expectedEntity, $actualEntity);

    }

    public function classNameDataProvider()
    {
        return [
            [FunctionalEntityDetailAssembler::class, 'Domain\SubDomain', 'FunctionalEntity'],
            [FunctionalEntityDetailResponse::class, 'Domain\SubDomain', 'FunctionalEntity'],
            [FunctionalEntityDetail::class, 'Domain\SubDomain', 'FunctionalEntity'],
            [FunctionalEntityImpl::class, 'Domain\SubDomain', 'FunctionalEntity'],
            [FunctionalEntityListItemAssembler::class, 'Domain\SubDomain', 'FunctionalEntity'],
            [FunctionalEntityListItemResponseDTO::class, 'Domain\SubDomain', 'FunctionalEntity'],
            [FunctionalEntityListItemResponse::class, 'Domain\SubDomain', 'FunctionalEntity'],
            [FunctionalEntityListItem::class, 'Domain\SubDomain', 'FunctionalEntity'],
            [FunctionalEntityResponseDTO::class, 'Domain\SubDomain', 'FunctionalEntity'],
            [FunctionalEntityResponse::class, 'Domain\SubDomain', 'FunctionalEntity'],
            [FunctionalEntityStub1::class, 'Domain\SubDomain', 'FunctionalEntity'],
            [FunctionalEntityTestCase::class, 'Domain\SubDomain', 'FunctionalEntity'],
        ];
    }

    protected function setUp()
    {
        $this->classNameUtilityMock = $this->getMockForTrait(ClassNameUtility::class);
    }
}
