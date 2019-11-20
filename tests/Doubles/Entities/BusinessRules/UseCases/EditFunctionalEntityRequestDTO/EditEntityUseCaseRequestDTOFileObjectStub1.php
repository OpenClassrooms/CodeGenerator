<?php declare(strict_types=1);

namespace OpenClassrooms\CodeGenerator\Tests\Doubles\Entities\BusinessRules\UseCases\EditFunctionalEntityRequestDTO;

use OpenClassrooms\CodeGenerator\Entities\Object\FileObject;
use OpenClassrooms\CodeGenerator\Tests\Doubles\Entities\BusinessRules\Entities\EntityFieldObjectStub2;
use OpenClassrooms\CodeGenerator\Tests\Doubles\Entities\BusinessRules\Entities\EntityFieldObjectStub3;
use OpenClassrooms\CodeGenerator\Tests\Doubles\Entities\BusinessRules\Entities\EntityFieldObjectStub4;
use OpenClassrooms\CodeGenerator\Tests\Doubles\Entities\BusinessRules\Entities\EntityFieldObjectStub5;
use OpenClassrooms\CodeGenerator\Tests\Doubles\Entities\BusinessRules\Entities\EntityMethodObjectStub2;
use OpenClassrooms\CodeGenerator\Tests\Doubles\Entities\BusinessRules\Entities\EntityMethodObjectStub3;
use OpenClassrooms\CodeGenerator\Tests\Doubles\Entities\BusinessRules\Entities\EntityMethodObjectStub4;
use OpenClassrooms\CodeGenerator\Tests\Doubles\Entities\BusinessRules\Entities\EntityMethodObjectStub5;

class EditEntityUseCaseRequestDTOFileObjectStub1 extends FileObject
{
    const CLASS_NAME = 'OpenClassrooms\CodeGenerator\Tests\Fixtures\Classes\BusinessRules\UseCases\Domain\SubDomain\DTO\Request\EditFunctionalEntityRequestDTO';

    public function __construct()
    {
        $this->content = __DIR__ . '/../../../../../Fixtures/Classes/BusinessRules/UseCases/Domain/SubDomain/DTO/Request/EditFunctionalEntityRequestDTO.php';
        $this->className = self::CLASS_NAME;
        $this->fields = [
            new EntityFieldObjectStub2(),
            new EntityFieldObjectStub3(),
            new EntityFieldObjectStub4(),
            new EntityFieldObjectStub5(),
            new EditEntityUseCaseRequestDTOFieldObjectStub1(),
            new EditEntityUseCaseRequestDTOFieldObjectStub2(),
            new EditEntityUseCaseRequestDTOFieldObjectStub3(),
            new EditEntityUseCaseRequestDTOFieldObjectStub4(),
            new EditEntityUseCaseRequestDTOFieldObjectStub5(),
        ];
        $this->methods = [
            new EntityMethodObjectStub2(),
            new EntityMethodObjectStub3(),
            new EntityMethodObjectStub4(),
            new EntityMethodObjectStub5(),
            new EditEntityUseCaseRequestDTOMethodObjectStub1(),
            new EditEntityUseCaseRequestDTOMethodObjectStub2(),
            new EditEntityUseCaseRequestDTOMethodObjectStub3(),
            new EditEntityUseCaseRequestDTOMethodObjectStub4(),
            new EditEntityUseCaseRequestDTOMethodObjectStub5(),
        ];
    }
}
