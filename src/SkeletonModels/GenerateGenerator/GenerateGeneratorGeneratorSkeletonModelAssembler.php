<?php

declare(strict_types=1);

namespace OpenClassrooms\CodeGenerator\SkeletonModels\GenerateGenerator;

interface GenerateGeneratorGeneratorSkeletonModelAssembler
{
    public function create(
        string $domain,
        string $entity,
        string $constructionPattern
    ): GenerateGeneratorGeneratorSkeletonModel;
}
