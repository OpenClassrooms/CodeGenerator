<?php

namespace OpenClassrooms\CodeGenerator\Generator\BusinessRules\UseCases;

use OpenClassrooms\CodeGenerator\Generator\AbstractGenerator;
use OpenClassrooms\CodeGenerator\Services\EntityClassObjectService;
use OpenClassrooms\CodeGenerator\Services\UseCaseClassObjectService;

/**
 * @author Romain Kuzniak <romain.kuzniak@openclassrooms.com>
 */
abstract class AbstractUseCaseGenerator extends AbstractGenerator
{

    /**
     * @var \OpenClassrooms\CodeGenerator\Services\EntityClassObjectService
     */
    protected $entityClassObjectService;

    /**
     * @var \OpenClassrooms\CodeGenerator\Services\UseCaseClassObjectService
     */
    protected $useCaseClassObjectService;

    public function setUseCaseClassObjectService(UseCaseClassObjectService $useCaseClassObjectService)
    {
        $this->useCaseClassObjectService = $useCaseClassObjectService;
    }

    public function setEntityClassObjectService(EntityClassObjectService $entityClassObjectService)
    {
        $this->entityClassObjectService = $entityClassObjectService;
    }
}
