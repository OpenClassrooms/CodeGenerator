<?php

namespace OpenClassrooms\CodeGenerator\Tests\Doubles\src\App\ViewModels\Web\Domain\SubDomain;

/**
 * @author Romain Kuzniak <romain.kuzniak@openclassrooms.com>
 */
interface ShowFunctionalEntityBuilder
{
    public function create(): ShowFunctionalEntityBuilder;

    public function withFunctionalEntityDetail(FunctionalEntityDetail $functionalEntityDetail): ShowFunctionalEntityBuilder;

    public function build(): ShowFunctionalEntity;
}
