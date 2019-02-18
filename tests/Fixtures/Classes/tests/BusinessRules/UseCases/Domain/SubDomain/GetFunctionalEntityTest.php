<?php declare(strict_types=1);

namespace OpenClassrooms\CodeGenerator\Tests\Fixtures\Classes\tests\BusinessRules\UseCases\Domain\SubDomain;

use OpenClassrooms\CodeGenerator\Tests\Fixtures\Classes\BusinessRules\UseCases\Domain\SubDomain\DTO\Request\GetFunctionalEntityRequestBuilderImpl;
use OpenClassrooms\CodeGenerator\Tests\Fixtures\Classes\BusinessRules\UseCases\Domain\SubDomain\DTO\Request\GetFunctionalEntityRequestDTO;
use PHPUnit\Framework\TestCase;

/**
 * @author authorStub <author.stub@example.com>
 */
class GetFunctionalEntityTest extends TestCase
{
    /**
     * @var GetFunctionalEntityRequestDTO
     */
    private $request;

    /**
     * @test
     */
    public function GetFunctionalEntity_ReturnResponse()
    {
        $this->fail("TODO: Implement this test");
    }

    /**
     * @inheritdoc
     */
    protected function setUp()
    {
        $builder = new GetFunctionalEntityRequestBuilderImpl();
        $this->request = $builder
            ->create()
            ->build();
    }
}
