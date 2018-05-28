<?php

namespace OpenClassrooms\CodeGenerator\Generator\BusinessRules\UseCases\Impl;

use OpenClassrooms\CodeGenerator\Generator\BusinessRules\UseCases\AbstractUseCaseGenerator;
use OpenClassrooms\CodeGenerator\Generator\BusinessRules\UseCases\UseCaseGenerator;

/**
 * @author Romain Kuzniak <romain.kuzniak@openclassrooms.com>
 */
class UseCaseGeneratorImpl extends AbstractUseCaseGenerator implements UseCaseGenerator
{
    public function generate(string $className, array $parameters = []): array
    {
        $useCase = $this->useCaseClassObjectService->getUseCase($className);

        return [$useCase->getClassName() => ''];
    }

}
