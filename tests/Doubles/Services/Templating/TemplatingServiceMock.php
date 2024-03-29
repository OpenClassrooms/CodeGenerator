<?php

declare(strict_types=1);

namespace OpenClassrooms\CodeGenerator\Tests\Doubles\Services\Templating;

use OpenClassrooms\CodeGenerator\Services\Impl\TemplatingServiceImpl;

class TemplatingServiceMock extends TemplatingServiceImpl
{
    public const SKELETON_DIR = '/../../../src/Skeleton';

    public function __construct()
    {
        parent::__construct(self::SKELETON_DIR);
    }
}
