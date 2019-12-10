<?php declare(strict_types=1);

namespace OpenClassrooms\CodeGenerator\Tests\Doubles\Entities\GenerateGenerator;

use OpenClassrooms\CodeGenerator\Entities\Object\FileObject;

class CustomTemplateFileObjectStub1 extends FileObject
{
    const CLASS_NAME = 'OpenClassrooms\CodeGenerator\Skeleton\GenerateGenerator\Custom.php.twig';

    public function __construct()
    {
        $this->content = __DIR__ . '/../../../Fixtures/Classes/Skeleton/GenerateGenerator/Custom.php.twig';
        $this->className = self::CLASS_NAME;
    }
}
