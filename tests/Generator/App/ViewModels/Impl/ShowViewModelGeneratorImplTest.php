<?php

namespace OpenClassrooms\CodeGenerator\Tests\Generator\App\ViewModels\Impl;

use OpenClassrooms\CodeGenerator\Generator\App\ViewModels\Impl\ShowViewModelGeneratorImpl;
use OpenClassrooms\CodeGenerator\Tests\Doubles\Services\ViewModelClassObjectServiceMock;
use OpenClassrooms\CodeGenerator\Tests\Doubles\src\BusinessRules\UseCases\Domain\SubDomain\DTO\Response\FunctionalEntityDetailResponseDTO;
use OpenClassrooms\CodeGenerator\Tests\Generator\GeneratorTestCase;

/**
 * @author Romain Kuzniak <romain.kuzniak@openclassrooms.com>
 */
class ShowViewModelGeneratorImplTest extends GeneratorTestCase
{
    /**
     * @test
     */
    public function generate()
    {
        $actual = $this->generator->generate(FunctionalEntityDetailResponseDTO::class);
        $this->assertSame(
            ['OpenClassrooms\CodeGenerator\Tests\Doubles\src\App\ViewModels\Web\Domain\SubDomain\ShowFunctionalEntity'],
            array_keys($actual)
        );
        $actual = array_values($actual);
        $expected = file_get_contents(
            __DIR__.'/../../../../Doubles/src/App/ViewModels/Web/Domain/SubDomain/ShowFunctionalEntity.php'
        );
        $this->assertSame($expected, $actual[0]);
    }

    protected function setUp()
    {
        $this->generator = new ShowViewModelGeneratorImpl();
        $this->generator->setViewModelClassObjectService(new ViewModelClassObjectServiceMock());
        parent::setUp();
    }
}
