<?php

namespace OpenClassrooms\CodeGenerator\Tests\Doubles\Generator\Tests\Api\ViewModels;

/**
 * @author Samuel Gomis <samuel.gomis@external.openclassrooms.com>
 */
class ViewModelTestMock
{
    /**
     * @var string
     */
    public $path;

    /**
     * @var string
     */
    public $fileContent;

    public function __construct()
    {
        $this->path = 'relative_path';
        $this->fileContent = 'file content';
    }
}
