<?php declare(strict_types=1);
// Auto Generated by OpenClassrooms Code Generator

namespace OpenClassrooms\CodeGenerator\Tests\Fixtures\Classes\BusinessRules\UseCases\Domain\SubDomain\DTO\Request;

use OpenClassrooms\CodeGenerator\Tests\Fixtures\Classes\BusinessRules\Requestors\Domain\SubDomain\CreateFunctionalEntityRequest;
use OpenClassrooms\CodeGenerator\Tests\Fixtures\Classes\BusinessRules\Requestors\Domain\SubDomain\CreateFunctionalEntityRequestBuilder;

class CreateFunctionalEntityRequestBuilderImpl implements CreateFunctionalEntityRequestBuilder
{
    /**
     * @var CreateFunctionalEntityRequestDTO
     */
    private $request;

    public function build(): CreateFunctionalEntityRequest
    {
        return $this->request;
    }

    public function create(): CreateFunctionalEntityRequestBuilder
    {
        $this->request = new CreateFunctionalEntityRequestDTO();

        return $this;
    }

    public function withField1(string $field1): CreateFunctionalEntityRequestBuilder
    {
        $this->request->field1 = $field1;

        return $this;
    }

    public function withField2(array $field2): CreateFunctionalEntityRequestBuilder
    {
        $this->request->field2 = $field2;

        return $this;
    }

    public function withField3(bool $field3): CreateFunctionalEntityRequestBuilder
    {
        $this->request->field3 = $field3;

        return $this;
    }

    public function withField4(\DateTimeImmutable $field4): CreateFunctionalEntityRequestBuilder
    {
        $this->request->field4 = $field4;

        return $this;
    }
}