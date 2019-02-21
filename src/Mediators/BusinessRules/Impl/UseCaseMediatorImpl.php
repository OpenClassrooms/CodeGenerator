<?php declare(strict_types=1);

namespace OpenClassrooms\CodeGenerator\Mediators\BusinessRules\Impl;

use OpenClassrooms\CodeGenerator\Mediators\BusinessRules\GenericUseCaseMediator;
use OpenClassrooms\CodeGenerator\Mediators\BusinessRules\RequestMediator;
use OpenClassrooms\CodeGenerator\Mediators\BusinessRules\UseCaseMediator;

/**
 * @author Samuel Gomis <gomis.samuel@external.openclassrooms.com>
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

    public function mediate(array $args = [], array $options = [])
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
