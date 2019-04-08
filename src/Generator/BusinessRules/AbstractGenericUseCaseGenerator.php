<?php declare(strict_types=1);

namespace OpenClassrooms\CodeGenerator\Generator\BusinessRules;

use OpenClassrooms\CodeGenerator\Entities\UseCaseFileObjectFactory;
use OpenClassrooms\CodeGenerator\Entities\UseCaseRequestFileObjectFactory;
use OpenClassrooms\CodeGenerator\Entities\UseCaseResponseFileObjectFactory;
use OpenClassrooms\CodeGenerator\Generator\AbstractGenerator;

/**
 * @author Samuel Gomis <gomis.samuel@external.openclassrooms.com>
 */
abstract class AbstractGenericUseCaseGenerator extends AbstractGenerator
{
    /**
     * @var UseCaseFileObjectFactory
     */
    protected $useCaseFileObjectFactory;

    /**
     * @var UseCaseRequestFileObjectFactory
     */
    protected $useCaseRequestFileObjectFactory;

    /**
     * @var UseCaseResponseFileObjectFactory
     */
    protected $useCaseResponseFileObjectFactory;

    public function setUseCaseFileObjectFactory(UseCaseFileObjectFactory $factory): void
    {
        $this->useCaseFileObjectFactory = $factory;
    }

    public function setUseCaseRequestFileObjectFactory(UseCaseRequestFileObjectFactory $factory): void
    {
        $this->useCaseRequestFileObjectFactory = $factory;
    }

    public function setUseCaseResponseFileObjectFactory(UseCaseResponseFileObjectFactory $factory): void
    {
        $this->useCaseResponseFileObjectFactory = $factory;
    }
}
