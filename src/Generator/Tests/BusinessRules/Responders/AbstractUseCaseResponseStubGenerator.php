<?php declare(strict_types=1);

namespace OpenClassrooms\CodeGenerator\Generator\Tests\BusinessRules\Responders;

use OpenClassrooms\CodeGenerator\Entities\EntityFileObjectFactory;
use OpenClassrooms\CodeGenerator\Entities\UseCaseResponseFileObjectFactory;
use OpenClassrooms\CodeGenerator\Entities\ViewModelFileObjectFactory;
use OpenClassrooms\CodeGenerator\Generator\AbstractGenerator;

/**
 * @author Samuel Gomis <samuel.gomis@external.openclassrooms.com>
 */
abstract class AbstractUseCaseResponseStubGenerator extends AbstractGenerator
{
    /**
     * @var EntityFileObjectFactory
     */
    protected $entityFileObjectFactory;

    /**
     * @var UseCaseResponseFileObjectFactory
     */
    protected $useCaseResponseFileObjectFactory;

    /**
     * @var ViewModelFileObjectFactory
     */
    protected $viewModelFileObjectFactory;

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
