<?php

namespace OpenClassrooms\CodeGenerator\Tests\Generator\BusinessRules\UseCases;

use OpenClassrooms\CodeGenerator\Generator\BusinessRules\UseCases\Impl\GetUseCaseGeneratorImpl;
use OpenClassrooms\CodeGenerator\Tests\Doubles\Services\EntityClassObjectServiceMock;
use OpenClassrooms\CodeGenerator\Tests\Doubles\Services\UseCaseClassObjectServiceMock;
use OpenClassrooms\CodeGenerator\Tests\Doubles\src\BusinessRules\Entities\Domain\SubDomain\FunctionalEntity;
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
        $actual = $this->generator->generate(FunctionalEntity::class);
        $this->assertSame(
            [
                'OpenClassrooms\CodeGenerator\Tests\Doubles\src\BusinessRules\UseCases\Domain\SubDomain\GetFunctionalEntity',
                'OpenClassrooms\CodeGenerator\Tests\Doubles\src\BusinessRules\Requestors\Domain\SubDomain\GetFunctionalEntityRequest',
                'OpenClassrooms\CodeGenerator\Tests\Doubles\src\BusinessRules\UseCases\Domain\SubDomain\DTO\Request\GetFunctionalEntityRequestDTO',
                'OpenClassrooms\CodeGenerator\Tests\Doubles\src\BusinessRules\Requestors\Domain\SubDomain\GetFunctionalEntityRequestBuilder',
                'OpenClassrooms\CodeGenerator\Tests\Doubles\src\BusinessRules\UseCases\Domain\SubDomain\DTO\Request\GetFunctionalEntityRequestBuilderImpl',
                'OpenClassrooms\CodeGenerator\Tests\Doubles\src\BusinessRules\Responders\Domain\SubDomain\FunctionalEntityResponse',
                'OpenClassrooms\CodeGenerator\Tests\Doubles\src\BusinessRules\Responders\Domain\SubDomain\FunctionalEntityDetailResponse',
                'OpenClassrooms\CodeGenerator\Tests\Doubles\src\BusinessRules\Responders\Domain\SubDomain\FunctionalEntityDetailResponseAssembler',
                'OpenClassrooms\CodeGenerator\Tests\Doubles\src\BusinessRules\UseCases\Domain\SubDomain\DTO\Response\FunctionalEntityResponseDTO',
                'OpenClassrooms\CodeGenerator\Tests\Doubles\src\BusinessRules\UseCases\Domain\SubDomain\DTO\Response\FunctionalEntityDetailResponseDTO',
                'OpenClassrooms\CodeGenerator\Tests\Doubles\src\BusinessRules\UseCases\Domain\SubDomain\DTO\Response\FunctionalEntityResponseAssemblerTrait',
                'OpenClassrooms\CodeGenerator\Tests\Doubles\src\BusinessRules\UseCases\Domain\SubDomain\DTO\Response\FunctionalEntityDetailResponseAssemblerImpl',
                'OpenClassrooms\CodeGenerator\Tests\Doubles\src\BusinessRules\Gateways\Domain\SubDomain\FunctionalEntityGateway',
                'OpenClassrooms\CodeGenerator\Tests\Doubles\src\App\Repository\Domain\SubDomain\FunctionalEntityRepository'
            ],
            array_keys($actual)
        );
        $actual = array_values($actual);

        $expected = file_get_contents(
            __DIR__.'/../../../../Doubles/src/BusinessRules/UseCases/Domain/SubDomain/GetFunctionalEntity.php'
        );
        $this->assertSame($expected, $actual[0]);
        $expected = file_get_contents(
            __DIR__.'/../../../../Doubles/src/BusinessRules/Requestors/Domain/SubDomain/GetFunctionalEntityRequest.php'
        );
        $this->assertSame($expected, $actual[1]);
        $expected = file_get_contents(
            __DIR__.'/../../../../Doubles/src/BusinessRules/UseCases/Domain/SubDomain/DTO/Request/GetFunctionalEntityRequestDTO.php'
        );
        $this->assertSame($expected, $actual[2]);
        $expected = file_get_contents(
            __DIR__.'/../../../../Doubles/src/BusinessRules/Requestors/Domain/SubDomain/GetFunctionalEntityRequestBuilder.php'
        );
        $this->assertSame($expected, $actual[3]);
        $expected = file_get_contents(
            __DIR__.'/../../../../Doubles/src/BusinessRules/UseCases/Domain/SubDomain/DTO/Request/GetFunctionalEntityRequestBuilderImpl.php'
        );
        $this->assertSame($expected, $actual[4]);
        $expected = file_get_contents(
            __DIR__.'/../../../../Doubles/src/BusinessRules/Responders/Domain/SubDomain/DoubleFunctionalEntityResponse.php'
        );
        $this->assertSame($expected, $actual[5]);
        $expected = file_get_contents(
            __DIR__.'/../../../../Doubles/src/BusinessRules/Responders/Domain/SubDomain/DoubleFunctionalEntityDetailResponse.php'
        );
        $this->assertSame($expected, $actual[6]);
        $expected = file_get_contents(
            __DIR__.'/../../../../Doubles/src/BusinessRules/Responders/Domain/SubDomain/FunctionalEntityDetailResponseAssembler.php'
        );
        $this->assertSame($expected, $actual[7]);
        $expected = file_get_contents(
            __DIR__.'/../../../../Doubles/src/BusinessRules/UseCases/Domain/SubDomain/DTO/Response/DoubleFunctionalEntityResponseDTO.php'
        );
        $this->assertSame($expected, $actual[8]);
        $expected = file_get_contents(
            __DIR__.'/../../../../Doubles/src/BusinessRules/UseCases/Domain/SubDomain/DTO/Response/DoubleFunctionalEntityDetailResponseDTO.php'
        );
        $this->assertSame($expected, $actual[9]);
        $expected = file_get_contents(
            __DIR__.'/../../../../Doubles/src/BusinessRules/UseCases/Domain/SubDomain/DTO/Response/DoubleFunctionalEntityResponseAssemblerTrait.php'
        );
        $this->assertSame($expected, $actual[10]);
        $expected = file_get_contents(
            __DIR__.'/../../../../Doubles/src/BusinessRules/UseCases/Domain/SubDomain/DTO/Response/DoubleFunctionalEntityDetailResponseAssemblerImpl.php'
        );
        $this->assertSame($expected, $actual[11]);
        $expected = file_get_contents(
            __DIR__.'/../../../../Doubles/src/BusinessRules/Gateways/Domain/SubDomain/FunctionalEntityGateway.php'
        );
        $this->assertSame($expected, $actual[12]);
        $expected = file_get_contents(
            __DIR__.'/../../../../Doubles/src/App/Repository/Domain/SubDomain/FunctionalEntityRepository.php'
        );
        $this->assertSame($expected, $actual[13]);

    }

    protected function setUp()
    {
        $this->generator = new GetUseCaseGeneratorImpl();
        $this->generator->setUseCaseClassObjectService(new UseCaseClassObjectServiceMock());
        $this->generator->setEntityClassObjectService(new EntityClassObjectServiceMock());
        parent::setUp();
    }
}
