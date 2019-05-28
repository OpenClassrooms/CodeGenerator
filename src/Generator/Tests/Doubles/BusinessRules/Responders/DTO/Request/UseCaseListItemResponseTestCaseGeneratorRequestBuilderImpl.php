<?php declare(strict_types=1);

namespace OpenClassrooms\CodeGenerator\Generator\Tests\Doubles\BusinessRules\Responders\DTO\Request;

use OpenClassrooms\CodeGenerator\Generator\Tests\Doubles\BusinessRules\Responders\Request\UseCaseListItemResponseTestCaseGeneratorRequest;
use OpenClassrooms\CodeGenerator\Generator\Tests\Doubles\BusinessRules\Responders\Request\UseCaseListItemResponseTestCaseGeneratorRequestBuilder;

/**
 * @author Samuel Gomis <samuel.gomis@external.openclassrooms.com>
 */
class UseCaseListItemResponseTestCaseGeneratorRequestBuilderImpl implements UseCaseListItemResponseTestCaseGeneratorRequestBuilder
{
    /**
     * @var UseCaseListItemResponseTestCaseGeneratorRequestDTO
     */
    private $request;

    public function create(): UseCaseListItemResponseTestCaseGeneratorRequestBuilder
    {
        $this->request = new UseCaseListItemResponseTestCaseGeneratorRequestDTO();

        return $this;
    }

    public function withEntity(string $entity): UseCaseListItemResponseTestCaseGeneratorRequestBuilder
    {
        $this->request->entity = $entity;

        return $this;
    }

    public function withFields(array $fields): UseCaseListItemResponseTestCaseGeneratorRequestBuilder
    {
        $this->request->fields = $fields;

        return $this;
    }

    public function build(): UseCaseListItemResponseTestCaseGeneratorRequest
    {
        return $this->request;
    }
}
