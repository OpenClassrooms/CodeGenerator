<?php

declare(strict_types=1);

namespace OpenClassrooms\CodeGenerator\Tests\Doubles\Entities;

use OpenClassrooms\CodeGenerator\Entities\Impl\UseCaseResponseFileObjectFactoryImpl;
use OpenClassrooms\CodeGenerator\Entities\Object\FileObject;
use OpenClassrooms\CodeGenerator\Entities\Type\UseCaseResponseFileObjectType;
use OpenClassrooms\CodeGenerator\Tests\Fixtures\FixturesConfig;

class UseCaseResponseFileObjectFactoryMock extends UseCaseResponseFileObjectFactoryImpl
{
    /**
     * @var bool
     */
    public $useCaseDetailResponseExist;

    /**
     * @var bool
     */
    public $useCaseListItemResponseExist;

    public function __construct(bool $useCaseDetailResponseExist = true, bool $useCaseListItemResponseExist = true)
    {
        $this->appDir = FixturesConfig::APP_DIR;
        $this->apiDir = FixturesConfig::API_DIR;
        $this->baseNamespace = FixturesConfig::BASE_NAMESPACE;
        $this->testsBaseNamespace = FixturesConfig::TEST_BASE_NAMESPACE;
        $this->stubNamespace = FixturesConfig::STUB_NAMESPACE;
        $this->useCaseDetailResponseExist = $useCaseDetailResponseExist;
        $this->useCaseListItemResponseExist = $useCaseListItemResponseExist;
    }

    public function create(string $type, string $domain, string $entity, string $baseNamespace = null): FileObject
    {
        if (!$this->useCaseDetailResponseExist && $type === UseCaseResponseFileObjectType::BUSINESS_RULES_USE_CASE_DETAIL_RESPONSE) {
            return new FileObject('Not exist classname');
        }
        if (!$this->useCaseListItemResponseExist && $type === UseCaseResponseFileObjectType::BUSINESS_RULES_USE_CASE_LIST_ITEM_RESPONSE) {
            return new FileObject('Not exist classname');
        }

        return parent::create($type, $domain, $entity, $baseNamespace);
    }
}
