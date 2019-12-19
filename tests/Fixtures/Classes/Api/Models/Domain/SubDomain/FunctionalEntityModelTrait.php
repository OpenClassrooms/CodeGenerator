<?php declare(strict_types=1);

namespace OpenClassrooms\CodeGenerator\Tests\Fixtures\Classes\Api\Models\Domain\SubDomain;

use Symfony\Component\Validator\Constraints as Assert;

trait FunctionalEntityModelTrait
{
    /**
     * @var string
     *
     * @Assert\NotBlank
     * @Assert\Type("string")
     */
    public $field1;

    /**
     * @var string[]
     */
    public $field2;

    /**
     * @var bool
     *
     * @Assert\NotNull
     * @Assert\Type("bool")
     */
    public $field3;

    /**
     * @var \DateTimeInterface
     *
     * @Assert\NotBlank
     * @Assert\DateTime(format="Y-m-d\TH:i:sO")
     */
    public $field4;
}
