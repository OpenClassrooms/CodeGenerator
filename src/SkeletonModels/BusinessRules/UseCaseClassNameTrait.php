<?php

declare(strict_types=1);

namespace OpenClassrooms\CodeGenerator\SkeletonModels\BusinessRules;

trait UseCaseClassNameTrait
{
    /**
     * @var string
     */
    protected $transactionClassName;

    /**
     * @var string
     */
    protected $useCaseClassName;

    /**
     * @var string
     */
    protected $useCaseRequestClassName;

    public function setTransactionClassName(string $transactionClassName): void
    {
        $this->transactionClassName = $transactionClassName;
    }

    public function setUseCaseClassName(string $useCaseClassName): void
    {
        $this->useCaseClassName = $useCaseClassName;
    }

    public function setUseCaseRequestClassName(string $useCaseRequestClassName): void
    {
        $this->useCaseRequestClassName = $useCaseRequestClassName;
    }
}
