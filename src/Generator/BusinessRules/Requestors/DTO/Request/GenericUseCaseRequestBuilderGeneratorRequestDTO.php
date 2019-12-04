<?php declare(strict_types=1);

namespace OpenClassrooms\CodeGenerator\Generator\BusinessRules\Requestors\DTO\Request;

use OpenClassrooms\CodeGenerator\Generator\BusinessRules\Requestors\Request\GenericUseCaseRequestBuilderGeneratorRequest;

class GenericUseCaseRequestBuilderGeneratorRequestDTO implements GenericUseCaseRequestBuilderGeneratorRequest
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
