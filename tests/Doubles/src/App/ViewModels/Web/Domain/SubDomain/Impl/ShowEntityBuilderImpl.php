<?php

namespace OpenClassrooms\CodeGenerator\Tests\Doubles\src\App\ViewModels\Web\Domain\SubDomain\Impl;

use OpenClassrooms\CodeGenerator\Tests\Doubles\src\App\ViewModels\Web\Domain\SubDomain\EntityDetail;
use OpenClassrooms\CodeGenerator\Tests\Doubles\src\App\ViewModels\Web\Domain\SubDomain\ShowEntity;
use OpenClassrooms\CodeGenerator\Tests\Doubles\src\App\ViewModels\Web\Domain\SubDomain\ShowEntityBuilder;

/**
 * @author Romain Kuzniak <romain.kuzniak@openclassrooms.com>
 */
class ShowEntityBuilderImpl implements ShowEntityBuilder
{
    /**
     * @var \OpenClassrooms\CodeGenerator\Tests\Doubles\src\App\ViewModels\Web\Domain\SubDomain\Impl\ShowEntityImpl
     */
    private $vm;

    public function create(): ShowEntityBuilder
    {
        $this->vm = new ShowEntityImpl();

        return $this;
    }

    public function withEntityDetail(EntityDetail $entityDetail): ShowEntityBuilder
    {
        $this->vm->entityDetail = $entityDetail;

        return $this;
    }

    public function build(): ShowEntity
    {
        return $this->vm;
    }
}
