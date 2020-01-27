<?php

declare(strict_types=1);

namespace OpenClassrooms\CodeGenerator\Generator\Api\Models\DTO\Request;

use OpenClassrooms\CodeGenerator\Generator\Api\Models\Request\PostEntityModelGeneratorRequest;

class PostEntityModelGeneratorRequestDTO implements PostEntityModelGeneratorRequest
{
    /**
     * @var string
     */
    public $entityClassName;

    public function getEntityClassName(): string
    {
        return $this->entityClassName;
    }
}
