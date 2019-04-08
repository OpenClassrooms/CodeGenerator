<?php declare(strict_types=1);

namespace OpenClassrooms\CodeGenerator\SkeletonModels\SelfGenerator;

/**
 * @author Samuel Gomis <samuel.gomis@external.openclassrooms.com>
 */
interface SelfGeneratorGeneratorSkeletonModelAssembler
{
    public function create(string $domain, string $entity): SelfGeneratorGeneratorSkeletonModel;
}
