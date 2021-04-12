<?php

declare(strict_types=1);

namespace OpenClassrooms\CodeGenerator\Generator\Tests\BusinessRules\Responders;

use OpenClassrooms\CodeGenerator\Entities\EntityFileObjectFactory;
use OpenClassrooms\CodeGenerator\Entities\UseCaseResponseFileObjectFactory;
use OpenClassrooms\CodeGenerator\Entities\ViewModelFileObjectFactory;
use OpenClassrooms\CodeGenerator\Generator\AbstractGenerator;

abstract class AbstractUseCaseResponseStubGenerator extends AbstractGenerator
{
    protected EntityFileObjectFactory $entityFileObjectFactory;

    protected UseCaseResponseFileObjectFactory $useCaseResponseFileObjectFactory;

    protected ViewModelFileObjectFactory $viewModelFileObjectFactory;

    public function setEntityFileObjectFactory(EntityFileObjectFactory $entityFileObjectFactory): void
    {
        $this->entityFileObjectFactory = $entityFileObjectFactory;
    }

    public function setUseCaseResponseFileObjectFactory(
        UseCaseResponseFileObjectFactory $useCaseDetailResponseFileObjectFactory
    ): void {
        $this->useCaseResponseFileObjectFactory = $useCaseDetailResponseFileObjectFactory;
    }

    public function setViewModelFileObjectFactory(ViewModelFileObjectFactory $viewModelFileObjectFactory): void
    {
        $this->viewModelFileObjectFactory = $viewModelFileObjectFactory;
    }
}
