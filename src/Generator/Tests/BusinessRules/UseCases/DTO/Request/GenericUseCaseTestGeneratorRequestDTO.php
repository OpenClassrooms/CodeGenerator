<?php declare(strict_types=1);

namespace OpenClassrooms\CodeGenerator\Generator\Tests\BusinessRules\UseCases\DTO\Request;

use OpenClassrooms\CodeGenerator\Generator\Tests\BusinessRules\UseCases\Request\GenericUseCaseTestGeneratorRequest;

class GenericUseCaseTestGeneratorRequestDTO implements GenericUseCaseTestGeneratorRequest
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
