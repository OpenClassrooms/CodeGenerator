<?php declare(strict_types=1);

namespace OpenClassrooms\CodeGenerator\Mediators\BusinessRules\UseCases\Impl;

use OpenClassrooms\CodeGenerator\Mediators\BusinessRules\Requestors\RequestMediator;
use OpenClassrooms\CodeGenerator\Mediators\BusinessRules\UseCases\GenericUseCaseMediator;
use OpenClassrooms\CodeGenerator\Mediators\BusinessRules\UseCases\UseCaseMediator;

/**
 * @author Samuel Gomis <samuel.gomis@external.openclassrooms.com>
 */
class UseCaseMediatorImpl implements UseCaseMediator
{
    /**
     * @var GenericUseCaseMediator
     */
    private $genericUseCaseMediator;

    /**
     * @var RequestMediator
     */
    private $requestMediator;

    public function mediate(array $args = [], array $options = []): array
    {
        return array_merge(
            $this->requestMediator->mediate($args, $options),
            $this->genericUseCaseMediator->mediate($args, $options)
        );
    }

    public function setRequestMediator(RequestMediator $requestMediator): void
    {
        $this->requestMediator = $requestMediator;
    }

    public function setGenericUseCaseMediator(GenericUseCaseMediator $genericUseCaseMediator): void
    {
        $this->genericUseCaseMediator = $genericUseCaseMediator;
    }
}
