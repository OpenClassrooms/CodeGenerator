<?php

declare(strict_types=1);

namespace OpenClassrooms\CodeGenerator\Generator\BusinessRules;

use OpenClassrooms\CodeGenerator\Entities\EntityFileObjectFactory;
use OpenClassrooms\CodeGenerator\Entities\Object\MethodObject;
use OpenClassrooms\CodeGenerator\Entities\UseCaseFileObjectFactory;
use OpenClassrooms\CodeGenerator\Entities\UseCaseRequestFileObjectFactory;
use OpenClassrooms\CodeGenerator\Entities\UseCaseResponseFileObjectFactory;
use OpenClassrooms\CodeGenerator\Generator\AbstractGenerator;
use OpenClassrooms\CodeGenerator\Utility\MethodUtility;

abstract class AbstractUseCaseGenerator extends AbstractGenerator
{
    /**
     * @var EntityFileObjectFactory
     */
    protected $entityFileObjectFactory;

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

    public function setEntityFileObjectFactory(EntityFileObjectFactory $entityFileObjectFactory): void
    {
        $this->entityFileObjectFactory = $entityFileObjectFactory;
    }

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

    /**
     * @param string[] $fields
     *
     * @return MethodObject[]
     */
    protected function getSelectedAccessors(string $className, array $fields): array
    {
        return MethodUtility::getSelectedAccessors($className, $fields);
    }
}
