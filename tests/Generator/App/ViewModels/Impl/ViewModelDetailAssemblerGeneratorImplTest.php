<?php

namespace OpenClassrooms\CodeGenerator\Tests\Generator\App\ViewModels\Impl;

use OpenClassrooms\CodeGenerator\Generator\App\ViewModels\Impl\ViewModelAssemblerTraitGeneratorImpl;
use OpenClassrooms\CodeGenerator\Generator\App\ViewModels\Impl\ViewModelDetailAssemblerGeneratorImpl;
use OpenClassrooms\CodeGenerator\Tests\Doubles\Services\UseCaseClassObjectServiceMock;
use OpenClassrooms\CodeGenerator\Tests\Doubles\Services\ViewModelClassObjectServiceMock;
use OpenClassrooms\CodeGenerator\Tests\Doubles\src\BusinessRules\UseCases\Domain\SubDomain\DTO\Response\EntityDetailResponseDTO;
use OpenClassrooms\CodeGenerator\Tests\Generator\GeneratorTestCase;

/**
 * @author Romain Kuzniak <romain.kuzniak@openclassrooms.com>
 */
class ViewModelDetailAssemblerGeneratorImplTest extends GeneratorTestCase
{
    /**
     * @test
     */
    public function generate()
    {
        $actual = $this->generator->generate(EntityDetailResponseDTO::class);
        $this->assertSame(
            [
                'OpenClassrooms\CodeGenerator\Tests\Doubles\src\App\ViewModels\Web\Domain\SubDomain\EntityAssemblerTrait',
                'OpenClassrooms\CodeGenerator\Tests\Doubles\src\App\ViewModels\Web\Domain\SubDomain\EntityDetailAssembler',
                'OpenClassrooms\CodeGenerator\Tests\Doubles\src\App\ViewModels\Web\Domain\SubDomain\Impl\EntityDetailAssemblerImpl'
            ],
            array_keys($actual)
        );
        $actual = array_values($actual);
        $expected = file_get_contents(
            __DIR__.'/../../../../Doubles/src/App/ViewModels/Web/Domain/SubDomain/EntityAssemblerTrait.php'
        );
        $this->assertSame($expected, $actual[0]);

        $expected = file_get_contents(
            __DIR__.'/../../../../Doubles/src/App/ViewModels/Web/Domain/SubDomain/EntityDetailAssembler.php'
        );
        $this->assertSame($expected, $actual[1]);

        $expected = file_get_contents(
            __DIR__.'/../../../../Doubles/src/App/ViewModels/Web/Domain/SubDomain/Impl/EntityDetailAssemblerImpl.php'
        );
        $this->assertSame($expected, $actual[2]);

    }

    protected function setUp()
    {
        $this->generator = new ViewModelDetailAssemblerGeneratorImpl();
        $this->generator->setUseCaseClassObjectService(new UseCaseClassObjectServiceMock());
        $this->generator->setViewModelClassObjectService(new ViewModelClassObjectServiceMock());
        /** @var \OpenClassrooms\CodeGenerator\Generator\App\ViewModels\ViewModelAssemblerTraitGenerator $viewModelAssemblerTraitGenerator */
        /** @var ViewModelAssemblerTraitGeneratorImpl $viewModelAssemblerTraitGenerator */
        $viewModelAssemblerTraitGenerator = $this->buildGenerator(new ViewModelAssemblerTraitGeneratorImpl());
        $viewModelAssemblerTraitGenerator->setUseCaseClassObjectService(new UseCaseClassObjectServiceMock());
        $viewModelAssemblerTraitGenerator->setViewModelClassObjectService(new ViewModelClassObjectServiceMock());
        $this->generator->setViewModelAssemblerTraitGenerator($viewModelAssemblerTraitGenerator);
        parent::setUp();
    }
}
