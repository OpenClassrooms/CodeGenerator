<?php declare(strict_types=1);

namespace OpenClassrooms\CodeGenerator\Tests\Doubles\Entities\BusinessRules\UseCases;

use OpenClassrooms\CodeGenerator\Entities\FileObject;

/**
 * @author Samuel Gomis <samuel.gomis@external.openclassrooms.com>
 */
class GetEntityUseCaseRequestDTOFileObjectStub1 extends FileObject
{
    const CLASS_NAME = 'OpenClassrooms\CodeGenerator\Tests\Fixtures\Classes\BusinessRules\UseCases\Domain\SubDomain\DTO\Request\GetFunctionalEntityRequestDTO';

    public function __construct()
    {
        $this->content = __DIR__ . '/../../../../Fixtures/Classes/BusinessRules/UseCases/Domain/SubDomain/DTO/Request/GetFunctionalEntityRequestDTO.php';
        $this->className = self::CLASS_NAME;
        $this->fields = [];
    }
}
