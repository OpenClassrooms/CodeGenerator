<?php declare(strict_types=1);

namespace OpenClassrooms\CodeGenerator\Tests\Services\Impl;

use OpenClassrooms\CodeGenerator\Services\RoutingFactoryService;
use OpenClassrooms\CodeGenerator\Tests\Doubles\Services\Templating\RoutingServiceFactoryMock;
use PHPUnit\Framework\TestCase;

class RoutingFactoryServiceImplTest extends TestCase
{
    /**
     * @var RoutingFactoryService
     */
    private $routingFactoryService;

    /**
     * @test
     * @dataProvider routingFactoryProvider
     */
    public function createRouteReturnString(
        string $domain,
        string $entity,
        string $method,
        string $expected
    ): void {
        $actual = $this->routingFactoryService->create($domain, $entity, $method);

        $this->assertEquals($expected, $actual);
    }

    public function routingFactoryProvider(): array
    {
        return [
            [
                'Domain\SubDomain',
                'FunctionalEntity',
                'get',
                '"/functional-entities/{functionalEntityId}", name="oc_api_sub_domain_functional_entity_get", methods={"GET"}, requirements={"functionalEntityId"="^\d{1,9}$"}',
            ],
            [
                'Domain\SubDomain',
                'FunctionalEntity',
                'patch',
                '"/functional-entities/{functionalEntityId}", name="oc_api_sub_domain_functional_entity_patch", methods={"PATCH"}, requirements={"functionalEntityId"="^\d{1,9}$"}',
            ],
            [
                'Domain\SubDomain',
                'FunctionalEntity',
                'put',
                '"/functional-entities/{functionalEntityId}", name="oc_api_sub_domain_functional_entity_put", methods={"PUT"}, requirements={"functionalEntityId"="^\d{1,9}$"}',
            ],
            [
                'Domain\SubDomain',
                'FunctionalEntity',
                'delete',
                '"/functional-entities/{functionalEntityId}", name="oc_api_sub_domain_functional_entity_delete", methods={"DELETE"}, requirements={"functionalEntityId"="^\d{1,9}$"}',
            ],
            [
                'Domain\SubDomain',
                'FunctionalEntity',
                'get-all',
                '"/functional-entities", name="oc_api_sub_domain_functional_entity_get_all", methods={"GET"}',
            ],
        ];
    }

    protected function setUp()
    {
        $this->routingFactoryService = new RoutingServiceFactoryMock();
    }
}
