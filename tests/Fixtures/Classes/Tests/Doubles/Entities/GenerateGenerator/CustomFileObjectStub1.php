<?php declare(strict_types=1);

namespace OpenClassrooms\CodeGenerator\Tests\Doubles\Entities\GenerateGenerator;

use OpenClassrooms\CodeGenerator\Entities\FileObject;

/**
 * @author authorStub <author.stub@example.com>
 */
class CustomFileObjectStub1 extends FileObject
{
    const CLASS_NAME = 'OpenClassrooms\CodeGenerator\Tests\Fixtures\Classes\GenerateGenerator\Custom';

    public function __construct()
    {
        $this->content = __DIR__ . '/../../../../Fixtures/Classes/GenerateGenerator/Custom.php';
        $this->className = self::CLASS_NAME;
        $this->fields = [];
    }
}
