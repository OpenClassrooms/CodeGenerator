<?php

declare(strict_types=1);

namespace OpenClassrooms\CodeGenerator\Tests\Fixtures\Classes\Api\Models\Domain\SubDomain;

class PutFunctionalEntityModel
{
    use FunctionalEntityModelTrait;

    protected const FIELD_1_API_FIELD_NAME = 'field1';

    protected const FIELD_2_API_FIELD_NAME = 'field2';

    protected const FIELD_3_API_FIELD_NAME = 'field3';

    protected const FIELD_4_API_FIELD_NAME = 'field4';

    protected function build(array $data)
    {
        $this->field1 = array_key_exists(self::FIELD_1_API_FIELD_NAME, $data)
            ? $data[self::FIELD_1_API_FIELD_NAME] : null;
        $this->field2 = array_key_exists(self::FIELD_2_API_FIELD_NAME, $data)
            ? $data[self::FIELD_2_API_FIELD_NAME] : null;
        $this->field3 = array_key_exists(self::FIELD_3_API_FIELD_NAME, $data)
            ? $data[self::FIELD_3_API_FIELD_NAME] : null;
        $this->field4 = array_key_exists(self::FIELD_4_API_FIELD_NAME, $data)
            ? $data[self::FIELD_4_API_FIELD_NAME] : null;
    }
}
