<?php declare(strict_types=1);

namespace OpenClassrooms\CodeGenerator\Tests\Doubles\Entities\SelfGenerator;

use OpenClassrooms\CodeGenerator\Entities\FileObject;

/**
 * @author Samuel Gomis <gomis.samuel@external.openclassrooms.com>
 */
class CustomTemplateFileObjectStub1 extends FileObject
{
    const CLASS_NAME = 'OpenClassrooms\CodeGenerator\Tests\Fixtures\Classes\Skeleton\SelfGenerator\Custom.php.twig';

    public function __construct()
    {
        $this->content = __DIR__ . '/../../../Fixtures/Classes/Skeleton/SelfGenerator/Custom.php.twig';
        $this->className = self::CLASS_NAME;
    }
}
