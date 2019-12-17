<?php declare(strict_types=1);

namespace OpenClassrooms\CodeGenerator\Tests\Fixtures\Classes\Api\Models\Domain\SubDomain;

use Symfony\Component\Validator\Constraints as Assert;

abstract class AbstractFunctionalEntity
{
    protected const FIELD_1_API_FIELD_NAME = 'field1';

    protected const FIELD_2_API_FIELD_NAME = 'field2';

    protected const FIELD_3_API_FIELD_NAME = 'field3';

    protected const FIELD_4_API_FIELD_NAME = 'field4';

    /**
     * @var string
     *
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
     * @Assert\NotBlank
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
