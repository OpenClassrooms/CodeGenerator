<?php

namespace OpenClassrooms\CodeGenerator\Mediators;

use OpenClassrooms\CodeGenerator\Generator\BusinessRules\UseCases\UseCaseGenerator;

/**
 * @author Romain Kuzniak <romain.kuzniak@openclassrooms.com>
 */
class UseCaseMediator
{
    /**
     * @var \OpenClassrooms\CodeGenerator\Generator\BusinessRules\UseCases\UseCaseGenerator
     */
    private $useCaseGenerator;

    public function generate($className)
    {
        $$this->useCaseGenerator->generate($className);
    }

    public function setUseCaseGenerator(UseCaseGenerator $useCaseGenerator)
    {
        $this->useCaseGenerator = $useCaseGenerator;
    }
}
