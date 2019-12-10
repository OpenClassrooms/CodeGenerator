<?php declare(strict_types=1);

namespace OpenClassrooms\CodeGenerator\Utility;

use OpenClassrooms\CodeGenerator\Tests\Fixtures\Classes\Api\ViewModels\Domain\SubDomain\FunctionalEntityViewModelDetail;
use OpenClassrooms\CodeGenerator\Tests\Fixtures\Classes\Api\ViewModels\Domain\SubDomain\FunctionalEntityViewModelDetailAssembler;
use OpenClassrooms\CodeGenerator\Tests\Fixtures\Classes\Api\ViewModels\Domain\SubDomain\FunctionalEntityViewModelListItem;
use OpenClassrooms\CodeGenerator\Tests\Fixtures\Classes\Api\ViewModels\Domain\SubDomain\FunctionalEntityViewModelListItemAssembler;
use OpenClassrooms\CodeGenerator\Tests\Fixtures\Classes\App\Entity\Domain\SubDomain\FunctionalEntityImpl;
use OpenClassrooms\CodeGenerator\Tests\Fixtures\Classes\BusinessRules\Responders\Domain\SubDomain\FunctionalEntityDetailResponse;
use OpenClassrooms\CodeGenerator\Tests\Fixtures\Classes\BusinessRules\Responders\Domain\SubDomain\FunctionalEntityListItemResponse;
use OpenClassrooms\CodeGenerator\Tests\Fixtures\Classes\BusinessRules\Responders\Domain\SubDomain\FunctionalEntityResponse;
use OpenClassrooms\CodeGenerator\Tests\Fixtures\Classes\BusinessRules\UseCases\Domain\SubDomain\DTO\Response\FunctionalEntityListItemResponseDTO;
use OpenClassrooms\CodeGenerator\Tests\Fixtures\Classes\BusinessRules\UseCases\Domain\SubDomain\DTO\Response\FunctionalEntityResponseCommonFieldTrait;
use OpenClassrooms\CodeGenerator\Tests\Fixtures\Classes\Tests\Doubles\Api\ViewModels\Domain\SubDomain\FunctionalEntityViewModelTestCase;
use OpenClassrooms\CodeGenerator\Tests\Fixtures\Classes\Tests\Doubles\BusinessRules\Entities\Domain\SubDomain\FunctionalEntityStub1;
use PHPUnit\Framework\TestCase;

class FileObjectUtilityTest extends TestCase
{
    public function fileObjectDataProvider(): array
    {
        return [
            [
                FunctionalEntityViewModelDetailAssembler::class,
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
                FunctionalEntityViewModelDetail::class,
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
                FunctionalEntityViewModelListItemAssembler::class,
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
                FunctionalEntityViewModelListItem::class,
                'OpenClassrooms\CodeGenerator\Tests\Fixtures\Classes\\',
                'Domain\SubDomain',
                'FunctionalEntity',
            ],
            [
                FunctionalEntityResponseCommonFieldTrait::class,
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
                'OpenClassrooms\CodeGenerator\Tests\Fixtures\Classes\Tests\Doubles\\',
                'Domain\SubDomain',
                'FunctionalEntity',
            ],
            [
                FunctionalEntityViewModelTestCase::class,
                'OpenClassrooms\CodeGenerator\Tests\Fixtures\Classes\Tests\Doubles\\',
                'Domain\SubDomain',
                'FunctionalEntity',
            ],
            [
                FileObjectUtilityTest::class,
                'OpenClassrooms\CodeGenerator\Utility\\',
                'CodeGenerator\Utility',
                'FileObjectUtility',
            ],
            [
                'BusinessRules\UseCases\Domain\SubDomain\GenericUseCase',
                '',
                'Domain\SubDomain',
                'GenericUseCase',
            ],
        ];
    }

    /**
     * @test
     * @dataProvider fileObjectDataProvider
     */
    public function getBaseNamespaceDomainAndEntityNameFromClassName_ReturnArray(
        string $className,
        string $expectedBaseNamespace,
        string $expectedDomain,
        string $expectedEntity
    ): void {
        [
            $actualBaseNamespace,
            $actualDomain,
            $actualEntity,
        ] = FileObjectUtility::getBaseNamespaceDomainAndEntityNameFromClassName($className);

        $this->assertEquals($expectedBaseNamespace, $actualBaseNamespace);
        $this->assertEquals($expectedDomain, $actualDomain);
        $this->assertEquals($expectedEntity, $actualEntity);
    }
}
