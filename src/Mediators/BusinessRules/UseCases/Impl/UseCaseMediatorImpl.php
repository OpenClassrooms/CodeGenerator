<?php

declare(strict_types=1);

namespace OpenClassrooms\CodeGenerator\Mediators\BusinessRules\UseCases\Impl;

use OpenClassrooms\CodeGenerator\Mediators\BusinessRules\Requestors\GenericUseCaseRequestMediator;
use OpenClassrooms\CodeGenerator\Mediators\BusinessRules\UseCases\GenericUseCaseMediator;
use OpenClassrooms\CodeGenerator\Mediators\BusinessRules\UseCases\UseCaseMediator;

class UseCaseMediatorImpl implements UseCaseMediator
{
    /**
     * @var GenericUseCaseMediator
     */
    private $genericUseCaseMediator;

    /**
     * @var GenericUseCaseRequestMediator
     */
    private $genericUseCaseRequestMediator;

    public function mediate(array $args = [], array $options = []): array
    {
        return array_merge(
            $this->genericUseCaseRequestMediator->mediate($args, $options),
            $this->genericUseCaseMediator->mediate($args, $options)
        );
    }

    public function setGenericUseCaseMediator(GenericUseCaseMediator $genericUseCaseMediator): void
    {
        $this->genericUseCaseMediator = $genericUseCaseMediator;
    }

    public function setGenericUseCaseRequestMediator(GenericUseCaseRequestMediator $genericUseCaseRequestMediator): void
    {
        $this->genericUseCaseRequestMediator = $genericUseCaseRequestMediator;
    }
}
