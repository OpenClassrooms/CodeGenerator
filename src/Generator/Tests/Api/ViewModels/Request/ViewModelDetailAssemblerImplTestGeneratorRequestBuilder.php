<?php declare(strict_types=1);

namespace OpenClassrooms\CodeGenerator\Generator\Tests\Api\ViewModels\Request;

/**
 * @author Samuel Gomis <samuel.gomis@external.openclassrooms.com>
 */
interface ViewModelDetailAssemblerImplTestGeneratorRequestBuilder
{
    public function create(): ViewModelDetailAssemblerImplTestGeneratorRequestBuilder;

    public function withResponseClassName(
        string $responseClassName
    ): ViewModelDetailAssemblerImplTestGeneratorRequestBuilder;

    public function build(): ViewModelDetailAssemblerImplTestGeneratorRequest;
}
