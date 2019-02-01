<?php declare(strict_types=1);

namespace OpenClassrooms\CodeGenerator\Tests\Doubles\Services\Templating;

use OpenClassrooms\CodeGenerator\Services\Impl\TemplatingServiceImpl;

/**
 * @author Samuel Gomis <gomis.samuel@external.openclassrooms.com>
 */
class TemplatingServiceMock extends TemplatingServiceImpl
{
    const AUTHOR = 'authorStub';

    const AUTHOR_MAIL = 'author.stub@example.com';

    const SKELETON_DIR = '/../../../src/Skeleton';

    public function __construct()
    {
        parent::__construct(self::SKELETON_DIR, self::AUTHOR, self::AUTHOR_MAIL);
    }
}
