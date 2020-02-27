<?php declare(strict_types=1);

namespace OpenClassrooms\CodeGenerator\Utility;

use PHPUnit\Framework\TestCase;

class RoutingUtilityTest extends TestCase
{
    /**
     * @test
     * @dataProvider routingFactoryProvider
     */
    public function createRouteAnnotationReturnString(
        string $baseNamespace,
        string $domain,
        string $entity,
        string $method,
        string $expected
    ): void {
        $actual = RoutingUtility::create($baseNamespace, $domain, $entity, $method);

        $this->assertEquals($expected, $actual);
    }

    public function routingFactoryProvider(): array
    {
        return [
            [
                'OC\\',
                'Domain\SubDomain',
                'FunctionalEntity',
                'get',
                '"/functional-entities/{functionalEntityId}", name="oc_api_sub_domain_functional_entity_get", methods={"GET"}, requirements={"functionalEntityId"="^\d{1,9}$"}',
            ],
            [
                'OC\\',
                'Domain\SubDomain',
                'FunctionalEntity',
                'patch',
                '"/functional-entities/{functionalEntityId}", name="oc_api_sub_domain_functional_entity_patch", methods={"PATCH"}, requirements={"functionalEntityId"="^\d{1,9}$"}',
            ],
            [
                'OC\\',
                'Domain\SubDomain',
                'FunctionalEntity',
                'put',
                '"/functional-entities/{functionalEntityId}", name="oc_api_sub_domain_functional_entity_put", methods={"PUT"}, requirements={"functionalEntityId"="^\d{1,9}$"}',
            ],
            [
                'OC\\',
                'Domain\SubDomain',
                'FunctionalEntity',
                'delete',
                '"/functional-entities/{functionalEntityId}", name="oc_api_sub_domain_functional_entity_delete", methods={"DELETE"}, requirements={"functionalEntityId"="^\d{1,9}$"}',
            ],
            [
                'OC\\',
                'Domain\SubDomain',
                'FunctionalEntity',
                'get-all',
                '"/functional-entities", name="oc_api_sub_domain_functional_entity_get_all", methods={"GET"}',
            ],
        ];
    }
}
