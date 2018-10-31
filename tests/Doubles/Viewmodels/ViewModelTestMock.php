<?php

namespace OpenClassrooms\CodeGenerator\Tests\Doubles\Viewmodels;

/**
 * @author Samuel Gomis <samuel.gomis@openclassrooms.com>
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
