<?php

namespace OpenClassrooms\CodeGenerator\Tests\Utility;

use OpenClassrooms\CodeGenerator\Tests\Doubles\BusinessRules\UseCases\Domain\SubDomain\DTO\Request\EditEntityRequestDTO;
use OpenClassrooms\CodeGenerator\Tests\Doubles\src\BusinessRules\UseCases\Domain\SubDomain\DTO\Response\EntityDetailResponseDTO;
use OpenClassrooms\CodeGenerator\Utility\NamespaceConverter;
use PHPUnit\Framework\TestCase;

/**
 * @author Romain Kuzniak <romain.kuzniak@openclassrooms.com>
 */
class NamespaceConverterTest extends TestCase
{

    public static function domainAndEntityNameFromClassNameDataProvider(): array
    {
        return [
            [EntityDetailResponseDTO::class, ['Domain\SubDomain', 'Entity']],
            [EditEntityRequestDTO::class, ['Domain\SubDomain', 'Entity']],
        ];
    }

    /**
     * @test
     * @dataProvider domainAndEntityNameFromClassNameDataProvider
     */
    public function getDomainAndEntityNameFromClassName($input, $expected)
    {
        $actual = NamespaceConverter::getDomainAndEntityNameFromClassName($input);
        $this->assertSame($expected, $actual);
    }
}
