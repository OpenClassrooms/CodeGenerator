<?php

namespace OpenClassrooms\CodeGenerator\Tests\Doubles\src\App\ViewModels\Web\Domain\SubDomain;

/**
 * @author Romain Kuzniak <romain.kuzniak@openclassrooms.com>
 */
interface ShowEntityBuilder
{
    public function create(): ShowEntityBuilder;

    public function withEntityDetail(EntityDetail $entityDetail): ShowEntityBuilder;

    public function build(): ShowEntity;
}
