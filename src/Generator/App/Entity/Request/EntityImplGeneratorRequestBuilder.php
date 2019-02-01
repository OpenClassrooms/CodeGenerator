<?php declare(strict_types=1);

namespace OpenClassrooms\CodeGenerator\Generator\App\Entity\Request;

use OpenClassrooms\CodeGenerator\Generator\GeneratorRequest;

/**
 * @author Samuel Gomis <samuel.gomis@external.openclassrooms.com>
 */
interface EntityImplGeneratorRequestBuilder extends GeneratorRequest
{
    public function create(): EntityImplGeneratorRequestBuilder;

    public function withClassName(string $className): EntityImplGeneratorRequestBuilder;

    public function build(): EntityImplGeneratorRequest;
}
