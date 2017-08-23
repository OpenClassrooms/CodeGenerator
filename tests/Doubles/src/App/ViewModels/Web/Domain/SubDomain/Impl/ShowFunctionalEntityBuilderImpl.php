<?php

namespace OpenClassrooms\CodeGenerator\Tests\Doubles\src\App\ViewModels\Web\Domain\SubDomain\Impl;

use OpenClassrooms\CodeGenerator\Tests\Doubles\src\App\ViewModels\Web\Domain\SubDomain\FunctionalEntityDetail;
use OpenClassrooms\CodeGenerator\Tests\Doubles\src\App\ViewModels\Web\Domain\SubDomain\ShowFunctionalEntity;
use OpenClassrooms\CodeGenerator\Tests\Doubles\src\App\ViewModels\Web\Domain\SubDomain\ShowFunctionalEntityBuilder;

/**
 * @author Romain Kuzniak <romain.kuzniak@openclassrooms.com>
 */
class ShowFunctionalEntityBuilderImpl implements ShowFunctionalEntityBuilder
{
    /**
     * @var \OpenClassrooms\CodeGenerator\Tests\Doubles\src\App\ViewModels\Web\Domain\SubDomain\Impl\ShowFunctionalEntityImpl
     */
    private $vm;

    public function create(): ShowFunctionalEntityBuilder
    {
        $this->vm = new ShowFunctionalEntityImpl();

        return $this;
    }

    public function withFunctionalEntityDetail(FunctionalEntityDetail $functionalEntityDetail): ShowFunctionalEntityBuilder
    {
        $this->vm->functionalEntityDetail = $functionalEntityDetail;

        return $this;
    }

    public function build(): ShowFunctionalEntity
    {
        return $this->vm;
    }
}
