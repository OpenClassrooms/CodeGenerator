<?php declare(strict_types=1);

namespace OpenClassrooms\CodeGenerator\SkeletonModels\BusinessRules;

trait UseCaseClassNameTrait
{
    /**
     * @var string
     */
    private $useCaseClassName;

    /**
     * @var string
     */
    private $useCaseRequestClassName;

    public function setUseCaseClassName(string $useCaseClassName): void
    {
        $this->useCaseClassName = $useCaseClassName;
    }

    public function setUseCaseRequestClassName(string $useCaseRequestClassName): void
    {
        $this->useCaseRequestClassName = $useCaseRequestClassName;
    }
}
