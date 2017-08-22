<?php

namespace OpenClassrooms\CodeGenerator\Tests\Generator\BusinessRules\UseCases;

use OpenClassrooms\CodeGenerator\Generator\BusinessRules\UseCases\Impl\GetUseCaseGeneratorImpl;
use OpenClassrooms\CodeGenerator\Tests\Doubles\Services\EntityClassObjectServiceMock;
use OpenClassrooms\CodeGenerator\Tests\Doubles\Services\UseCaseClassObjectServiceMock;
use OpenClassrooms\CodeGenerator\Tests\Doubles\src\BusinessRules\Entities\Domain\SubDomain\Entity;
use OpenClassrooms\CodeGenerator\Tests\Generator\GeneratorTestCase;

/**
 * @author Romain Kuzniak <romain.kuzniak@openclassrooms.com>
 */
class GetUseCaseGeneratorImplTest extends GeneratorTestCase
{
    /**
     * @test
     */
    public function generate()
    {
        $actual = $this->generator->generate(Entity::class);
        $this->assertSame(
            [
                'OpenClassrooms\CodeGenerator\Tests\Doubles\src\BusinessRules\UseCases\Domain\SubDomain\GetEntity',
                'OpenClassrooms\CodeGenerator\Tests\Doubles\src\BusinessRules\Requestors\Domain\SubDomain\GetEntityRequest',
                'OpenClassrooms\CodeGenerator\Tests\Doubles\src\BusinessRules\UseCases\Domain\SubDomain\DTO\Request\GetEntityRequestDTO',
                'OpenClassrooms\CodeGenerator\Tests\Doubles\src\BusinessRules\Requestors\Domain\SubDomain\GetEntityRequestBuilder',
                'OpenClassrooms\CodeGenerator\Tests\Doubles\src\BusinessRules\UseCases\Domain\SubDomain\DTO\Request\GetEntityRequestBuilderImpl',
                'OpenClassrooms\CodeGenerator\Tests\Doubles\src\BusinessRules\Responders\Domain\SubDomain\EntityResponse',
                'OpenClassrooms\CodeGenerator\Tests\Doubles\src\BusinessRules\Responders\Domain\SubDomain\EntityDetailResponse',
                'OpenClassrooms\CodeGenerator\Tests\Doubles\src\BusinessRules\Responders\Domain\SubDomain\EntityDetailResponseAssembler',
                'OpenClassrooms\CodeGenerator\Tests\Doubles\src\BusinessRules\UseCases\Domain\SubDomain\DTO\Response\EntityResponseDTO',
                'OpenClassrooms\CodeGenerator\Tests\Doubles\src\BusinessRules\UseCases\Domain\SubDomain\DTO\Response\EntityDetailResponseDTO',
                'OpenClassrooms\CodeGenerator\Tests\Doubles\src\BusinessRules\UseCases\Domain\SubDomain\DTO\Response\EntityResponseAssemblerTrait',
                'OpenClassrooms\CodeGenerator\Tests\Doubles\src\BusinessRules\UseCases\Domain\SubDomain\DTO\Response\EntityDetailResponseAssemblerImpl',
                'OpenClassrooms\CodeGenerator\Tests\Doubles\src\BusinessRules\Gateways\Domain\SubDomain\EntityGateway'
            ],
            array_keys($actual)
        );
        $actual = array_values($actual);

        $expected = file_get_contents(
            __DIR__.'/../../../../Doubles/src/BusinessRules/UseCases/Domain/SubDomain/GetEntity.php'
        );
        $this->assertSame($expected, $actual[0]);
        $expected = file_get_contents(
            __DIR__.'/../../../../Doubles/src/BusinessRules/Requestors/Domain/SubDomain/GetEntityRequest.php'
        );
        $this->assertSame($expected, $actual[1]);
        $expected = file_get_contents(
            __DIR__.'/../../../../Doubles/src/BusinessRules/UseCases/Domain/SubDomain/DTO/Request/GetEntityRequestDTO.php'
        );
        $this->assertSame($expected, $actual[2]);
        $expected = file_get_contents(
            __DIR__.'/../../../../Doubles/src/BusinessRules/Requestors/Domain/SubDomain/GetEntityRequestBuilder.php'
        );
        $this->assertSame($expected, $actual[3]);
        $expected = file_get_contents(
            __DIR__.'/../../../../Doubles/src/BusinessRules/UseCases/Domain/SubDomain/DTO/Request/GetEntityRequestBuilderImpl.php'
        );
        $this->assertSame($expected, $actual[4]);
        $expected = file_get_contents(
            __DIR__.'/../../../../Doubles/src/BusinessRules/Responders/Domain/SubDomain/DoubleEntityResponse.php'
        );
        $this->assertSame($expected, $actual[5]);
        $expected = file_get_contents(
            __DIR__.'/../../../../Doubles/src/BusinessRules/Responders/Domain/SubDomain/DoubleEntityDetailResponse.php'
        );
        $this->assertSame($expected, $actual[6]);
        $expected = file_get_contents(
            __DIR__.'/../../../../Doubles/src/BusinessRules/Responders/Domain/SubDomain/EntityDetailResponseAssembler.php'
        );
        $this->assertSame($expected, $actual[7]);
        $expected = file_get_contents(
            __DIR__.'/../../../../Doubles/src/BusinessRules/UseCases/Domain/SubDomain/DTO/Response/EntityResponseDTODouble.php'
        );
        $this->assertSame($expected, $actual[8]);
        $expected = file_get_contents(
            __DIR__.'/../../../../Doubles/src/BusinessRules/UseCases/Domain/SubDomain/DTO/Response/EntityDetailResponseDTODouble.php'
        );
        $this->assertSame($expected, $actual[9]);
        $expected = file_get_contents(
            __DIR__.'/../../../../Doubles/src/BusinessRules/UseCases/Domain/SubDomain/DTO/Response/DoubleEntityResponseAssemblerTrait.php'
        );
        $this->assertSame($expected, $actual[10]);
        $expected = file_get_contents(
            __DIR__.'/../../../../Doubles/src/BusinessRules/UseCases/Domain/SubDomain/DTO/Response/DoubleEntityDetailResponseAssemblerImpl.php'
        );
        $this->assertSame($expected, $actual[11]);
        $expected = file_get_contents(
            __DIR__.'/../../../../Doubles/src/BusinessRules/Gateways/Domain/SubDomain/EntityGateway.php'
        );
        $this->assertSame($expected, $actual[12]);
    }

    protected function setUp()
    {
        $this->generator = new GetUseCaseGeneratorImpl();
        $this->generator->setUseCaseClassObjectService(new UseCaseClassObjectServiceMock());
        $this->generator->setEntityClassObjectService(new EntityClassObjectServiceMock());
        parent::setUp();
    }
}
