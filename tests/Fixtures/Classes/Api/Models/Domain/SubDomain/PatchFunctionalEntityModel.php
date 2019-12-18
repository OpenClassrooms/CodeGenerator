<?php declare(strict_types=1);

namespace OpenClassrooms\CodeGenerator\Tests\Fixtures\Classes\Api\Models\Domain\SubDomain;

class PatchFunctionalEntityModel
{
    use FunctionalEntityModelTrait;

    protected const FIELD_1_API_FIELD_NAME = 'field1';

    protected const FIELD_2_API_FIELD_NAME = 'field2';

    protected const FIELD_3_API_FIELD_NAME = 'field3';

    protected const FIELD_4_API_FIELD_NAME = 'field4';

    /**
     * @var bool
     */
    public $field1Updated = false;

    /**
     * @var bool
     */
    public $field2Updated = false;

    /**
     * @var bool
     */
    public $field3Updated = false;

    /**
     * @var bool
     */
    public $field4Updated = false;

    protected function build(array $data)
    {
        if (array_key_exists(self::FIELD_1_API_FIELD_NAME, $data)) {
            $this->field1 = $data[self::FIELD_1_API_FIELD_NAME];
            $this->field1Updated = true;
        }

        if (array_key_exists(self::FIELD_2_API_FIELD_NAME, $data)) {
            $this->field2 = $data[self::FIELD_2_API_FIELD_NAME];
            $this->field2Updated = true;
        }

        if (array_key_exists(self::FIELD_3_API_FIELD_NAME, $data)) {
            $this->field3 = $data[self::FIELD_3_API_FIELD_NAME];
            $this->field3Updated = true;
        }

        if (array_key_exists(self::FIELD_4_API_FIELD_NAME, $data)) {
            $this->field4 = $data[self::FIELD_4_API_FIELD_NAME];
            $this->field4Updated = true;
        }
    }
}
