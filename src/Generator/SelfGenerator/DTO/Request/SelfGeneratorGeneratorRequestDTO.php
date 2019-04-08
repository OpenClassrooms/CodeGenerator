<?php declare(strict_types=1);

namespace OpenClassrooms\CodeGenerator\Generator\SelfGenerator\DTO\Request;

use OpenClassrooms\CodeGenerator\Generator\SelfGenerator\Request\SelfGeneratorGeneratorRequest;

/**
 * @author Samuel Gomis <samuel.gomis@external.openclassrooms.com>
 */
class SelfGeneratorGeneratorRequestDTO implements SelfGeneratorGeneratorRequest
{
    /**
     * @var string
     */
    public $domain;

    /**
     * @var string
     */
    public $entity;

    public function getDomain(): string
    {
        return $this->domain;
    }

    public function getEntity(): string
    {
        return $this->entity;
    }
}
