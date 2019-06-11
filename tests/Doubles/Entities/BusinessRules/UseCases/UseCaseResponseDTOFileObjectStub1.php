<?php declare(strict_types=1);

namespace OpenClassrooms\CodeGenerator\Tests\Doubles\Entities\BusinessRules\UseCases;

use OpenClassrooms\CodeGenerator\Entities\FileObject;
use OpenClassrooms\CodeGenerator\Tests\Doubles\Entities\BusinessRules\Entities\EntityFieldObjectStub1;
use OpenClassrooms\CodeGenerator\Tests\Doubles\Entities\BusinessRules\Entities\EntityFieldObjectStub2;
use OpenClassrooms\CodeGenerator\Tests\Doubles\Entities\BusinessRules\Entities\EntityFieldObjectStub3;
use OpenClassrooms\CodeGenerator\Tests\Doubles\Entities\BusinessRules\Entities\EntityFieldObjectStub4;
use OpenClassrooms\CodeGenerator\Tests\Doubles\Entities\BusinessRules\Entities\EntityMethodObjectStub1;
use OpenClassrooms\CodeGenerator\Tests\Doubles\Entities\BusinessRules\Entities\EntityMethodObjectStub2;
use OpenClassrooms\CodeGenerator\Tests\Doubles\Entities\BusinessRules\Entities\EntityMethodObjectStub3;
use OpenClassrooms\CodeGenerator\Tests\Doubles\Entities\BusinessRules\Entities\EntityMethodObjectStub4;

/**
 * @author Samuel Gomis <samuel.gomis@external.openclassrooms.com>
 */
class UseCaseResponseDTOFileObjectStub1 extends FileObject
{
    const CLASS_NAME = 'OpenClassrooms\CodeGenerator\Tests\Fixtures\Classes\BusinessRules\UseCases\Domain\SubDomain\DTO\Response\FunctionalEntityResponseDTO';

    public function __construct()
    {
        $this->content = __DIR__ . '/../../../../Fixtures/Classes/BusinessRules/UseCases/Domain/SubDomain/DTO/Response/FunctionalEntityResponseDTO.php';
        $this->className = self::CLASS_NAME;
        $this->fields = [
            new EntityFieldObjectStub1(),
            new EntityFieldObjectStub2(),
            new EntityFieldObjectStub3(),
            new EntityFieldObjectStub4(),
        ];
        $this->methods = [
            new EntityMethodObjectStub1(),
            new EntityMethodObjectStub2(),
            new EntityMethodObjectStub3(),
            new EntityMethodObjectStub4(),
        ];
    }
}
