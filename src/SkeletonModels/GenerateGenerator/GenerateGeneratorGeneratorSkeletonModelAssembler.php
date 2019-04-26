<?php declare(strict_types=1);

namespace OpenClassrooms\CodeGenerator\SkeletonModels\GenerateGenerator;

/**
 * @author Samuel Gomis <samuel.gomis@external.openclassrooms.com>
 */
interface GenerateGeneratorGeneratorSkeletonModelAssembler
{
    public function create(string $domain, string $entity, string $constructionPattern): GenerateGeneratorGeneratorSkeletonModel;
}
