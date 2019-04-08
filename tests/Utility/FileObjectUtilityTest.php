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
use PHPUnit\Framework\TestCase;

/**
 * @author Samuel Gomis <samuel.gomis@external.openclassrooms.com>
 */
class FileObjectUtilityTest extends TestCase
{
    /**
     * @test
     * @dataProvider fileObjectDataProvider
     */
    public function getBaseNamespaceDomainAndEntityNameFromClassName_ReturnArray(
        $className,
        $expectedBaseNamespace,
        $expectedDomain,
        $expectedEntity
    )
    {
        [
            $actualBaseNamespace,
            $actualDomain,
            $actualEntity,
        ] = FileObjectUtility::getBaseNamespaceDomainAndEntityNameFromClassName($className);

        $this->assertEquals($expectedBaseNamespace, $actualBaseNamespace);
        $this->assertEquals($expectedDomain, $actualDomain);
        $this->assertEquals($expectedEntity, $actualEntity);
    }

    public function fileObjectDataProvider()
    {
        return [
            [
                FunctionalEntityDetailAssembler::class,
                'OpenClassrooms\CodeGenerator\Tests\Fixtures\Classes\\',
                'Domain\SubDomain',
                'FunctionalEntity',
            ],
            [
                FunctionalEntityDetailResponse::class,
                'OpenClassrooms\CodeGenerator\Tests\Fixtures\Classes\\',
                'Domain\SubDomain',
                'FunctionalEntity',
            ],
            [
                FunctionalEntityDetail::class,
                'OpenClassrooms\CodeGenerator\Tests\Fixtures\Classes\\',
                'Domain\SubDomain',
                'FunctionalEntity',
            ],
            [
                FunctionalEntityImpl::class,
                'OpenClassrooms\CodeGenerator\Tests\Fixtures\Classes\\',
                'Domain\SubDomain',
                'FunctionalEntity',
            ],
            [
                FunctionalEntityListItemAssembler::class,
                'OpenClassrooms\CodeGenerator\Tests\Fixtures\Classes\\',
                'Domain\SubDomain',
                'FunctionalEntity',
            ],
            [
                FunctionalEntityListItemResponseDTO::class,
                'OpenClassrooms\CodeGenerator\Tests\Fixtures\Classes\\',
                'Domain\SubDomain',
                'FunctionalEntity',
            ],
            [
                FunctionalEntityListItemResponse::class,
                'OpenClassrooms\CodeGenerator\Tests\Fixtures\Classes\\',
                'Domain\SubDomain',
                'FunctionalEntity',
            ],
            [
                FunctionalEntityListItem::class,
                'OpenClassrooms\CodeGenerator\Tests\Fixtures\Classes\\',
                'Domain\SubDomain',
                'FunctionalEntity',
            ],
            [
                FunctionalEntityResponseDTO::class,
                'OpenClassrooms\CodeGenerator\Tests\Fixtures\Classes\\',
                'Domain\SubDomain',
                'FunctionalEntity',
            ],
            [
                FunctionalEntityResponse::class,
                'OpenClassrooms\CodeGenerator\Tests\Fixtures\Classes\\',
                'Domain\SubDomain',
                'FunctionalEntity',
            ],
            [
                FunctionalEntityStub1::class,
                'OpenClassrooms\CodeGenerator\Tests\Fixtures\Classes\tests\Doubles\\',
                'Domain\SubDomain',
                'FunctionalEntity',
            ],
            [
                FunctionalEntityTestCase::class,
                'OpenClassrooms\CodeGenerator\Tests\Fixtures\Classes\tests\Doubles\\',
                'Domain\SubDomain',
                'FunctionalEntity',
            ],
            [
                FileObjectUtilityTest::class,
                'OpenClassrooms\CodeGenerator\Utility\\',
                'CodeGenerator\Utility',
                'FileObjectUtilityTest',
            ],
            [
                'BusinessRules\UseCases\Domain\SubDomain\GenericUseCase',
                '',
                'Domain\SubDomain',
                'GenericUseCase',
            ],
        ];
    }
}
