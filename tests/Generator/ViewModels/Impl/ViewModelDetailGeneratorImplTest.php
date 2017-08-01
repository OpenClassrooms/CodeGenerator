<?php

namespace OpenClassrooms\CodeGenerator\Tests\Generator\ViewModels\Impl;

use OpenClassrooms\CodeGenerator\Generator\ViewModels\Impl\ViewModelDetailAbstractGeneratorImpl;
use OpenClassrooms\CodeGenerator\Generator\ViewModels\Impl\ViewModelGeneratorImpl;
use OpenClassrooms\CodeGenerator\Tests\Doubles\src\BusinessRules\UseCases\Domain\SubDomain\DTO\Response\EntityDetailResponseDTO;
use OpenClassrooms\CodeGenerator\Tests\Generator\GeneratorTestCase;

/**
 * @author Romain Kuzniak <romain.kuzniak@openclassrooms.com>
 */
class ViewModelDetailGeneratorImplTest extends GeneratorTestCase
{
    /**
     * @test
     */
    public function generate()
    {
        $actual = $this->generator->generate(EntityDetailResponseDTO::class);
        $this->assertSame(
            [
                'OpenClassrooms\CodeGenerator\Tests\Doubles\src\App\ViewModels\Web\Domain\SubDomain\Entity',
                'OpenClassrooms\CodeGenerator\Tests\Doubles\src\App\ViewModels\Web\Domain\SubDomain\EntityDetail',
                'OpenClassrooms\CodeGenerator\Tests\Doubles\src\App\ViewModels\Web\Domain\SubDomain\Impl\EntityDetailImpl'
            ],
            array_keys($actual)
        );
        $actual = array_values($actual);
        $expected = file_get_contents(
            __DIR__.'/../../../Doubles/src/App/ViewModels/Web/Domain/SubDomain/Entity.php'
        );
        $this->assertSame($expected, $actual[0]);

        $expected = file_get_contents(
            __DIR__.'/../../../Doubles/src/App/ViewModels/Web/Domain/SubDomain/EntityDetail.php'
        );
        $this->assertSame($expected, $actual[1]);

        $expected = file_get_contents(
            __DIR__.'/../../../Doubles/src/App/ViewModels/Web/Domain/SubDomain/Impl/EntityDetailImpl.php'
        );
        $this->assertSame($expected, $actual[2]);

    }

    protected function setUp()
    {
        $this->generator = new ViewModelDetailAbstractGeneratorImpl();
        /** @var \OpenClassrooms\CodeGenerator\Generator\ViewModels\ViewModelGenerator $viewModelGenerator */
        $viewModelGenerator = $this->buildGenerator(new ViewModelGeneratorImpl());
        $this->generator->setViewModelGenerator($viewModelGenerator);
        parent::setUp();
    }
}
