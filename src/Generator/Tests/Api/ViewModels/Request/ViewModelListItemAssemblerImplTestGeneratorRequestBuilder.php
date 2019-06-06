<?php declare(strict_types=1);

namespace OpenClassrooms\CodeGenerator\Generator\Tests\Api\ViewModels\Request;

/**
 * @author Samuel Gomis <samuel.gomis@external.openclassrooms.com>
 */
interface ViewModelListItemAssemblerImplTestGeneratorRequestBuilder
{
    public function create(): ViewModelListItemAssemblerImplTestGeneratorRequestBuilder;

    public function withResponseClassName(
        string $responseClassName
    ): ViewModelListItemAssemblerImplTestGeneratorRequestBuilder;

    public function build(): ViewModelListItemAssemblerImplTestGeneratorRequest;
}
