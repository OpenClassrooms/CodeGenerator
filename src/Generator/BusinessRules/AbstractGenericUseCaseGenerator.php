<?php declare(strict_types=1);

namespace OpenClassrooms\CodeGenerator\Generator\BusinessRules;

use OpenClassrooms\CodeGenerator\FileObjects\UseCaseFileObjectFactory;
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

    public function setUseCaseFileObjectFactory(UseCaseFileObjectFactory $useCaseFileObjectFactory): void
    {
        $this->useCaseFileObjectFactory = $useCaseFileObjectFactory;
    }
}
