<?php declare(strict_types=1);

namespace OpenClassrooms\CodeGenerator\Generator\BusinessRules\UseCases\DTO\Request;

use OpenClassrooms\CodeGenerator\Generator\BusinessRules\UseCases\Request\GenericUseCaseRequestBuilderImplGeneratorRequest;

class GenericUseCaseRequestBuilderImplGeneratorRequestDTO implements GenericUseCaseRequestBuilderImplGeneratorRequest
{
    /**
     * @var string
     */
    public $domain;

    /**
     * @var string
     */
    public $useCaseName;

    public function getDomain(): string
    {
        return $this->domain;
    }

    public function getUseCaseName(): string
    {
        return $this->useCaseName;
    }
}
