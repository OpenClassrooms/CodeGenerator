<?php declare(strict_types=1);

namespace OpenClassrooms\CodeGenerator\Tests\Doubles\Entities\GenerateGenerator;

use OpenClassrooms\CodeGenerator\Entities\Object\FileObject;

class CustomGeneratorRequestDTOFileObjectStub1 extends FileObject
{
    const CLASS_NAME = 'OpenClassrooms\CodeGenerator\Generator\GenerateGenerator\DTO\Request\CustomGeneratorRequestDTO';

    public function __construct()
    {
        $this->content = __DIR__ . '/../../../Fixtures/Classes/Generator/GenerateGenerator/DTO/Request/CustomGeneratorRequestDTO.php';
        $this->className = self::CLASS_NAME;
    }
}
