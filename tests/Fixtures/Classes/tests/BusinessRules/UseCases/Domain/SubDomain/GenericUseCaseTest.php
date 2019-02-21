<?php declare(strict_types=1);

namespace OpenClassrooms\CodeGenerator\Tests\Fixtures\Classes\tests\BusinessRules\UseCases\Domain\SubDomain;

use OpenClassrooms\CodeGenerator\Tests\Fixtures\Classes\BusinessRules\UseCases\Domain\SubDomain\DTO\Request\GenericUseCaseRequestBuilderImpl;
use OpenClassrooms\CodeGenerator\Tests\Fixtures\Classes\BusinessRules\UseCases\Domain\SubDomain\DTO\Request\GenericUseCaseRequestDTO;
use PHPUnit\Framework\TestCase;

/**
 * @author authorStub <author.stub@example.com>
 */
class GenericUseCaseTest extends TestCase
{
    /**
     * @var GenericUseCaseRequestDTO
     */
    private $request;

    /**
     * @test
     */
    public function GenericUseCase_ReturnResponse()
    {
        $this->fail("TODO: Implement this test");
    }

    /**
     * @inheritdoc
     */
    protected function setUp()
    {
        $builder = new GenericUseCaseRequestBuilderImpl();
        $this->request = $builder
            ->create()
            ->build();
    }
}