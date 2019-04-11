<?php declare(strict_types=1);

namespace OpenClassrooms\CodeGenerator\Tests\Doubles\Entities\SelfGenerator;

use OpenClassrooms\CodeGenerator\Entities\FileObject;

/**
 * @author Samuel Gomis <samuel.gomis@external.openclassrooms.com>
 */
class CustomGeneratorRequestFileObjectStub1 extends FileObject
{
    const CLASS_NAME = 'OpenClassrooms\CodeGenerator\Generator\SelfGenerator\Request\CustomGeneratorRequest';

    public function __construct()
    {
        $this->content = __DIR__ . '/../../../Fixtures/Classes/Generator/SelfGenerator/Request/CustomGeneratorRequest.php';
        $this->className = self::CLASS_NAME;
    }
}
