<?php

namespace OpenClassrooms\CodeGenerator\Mediators;

use Symfony\Component\Filesystem\Filesystem;

/**
 * @author Romain Kuzniak <romain.kuzniak@openclassrooms.com>
 */
abstract class Mediator
{
    /**
     * @var \Symfony\Component\Filesystem\Filesystem
     */
    private $fileSystem;

    public function setFileSystem(Filesystem $fileSystem)
    {
        $this->fileSystem = $fileSystem;
    }

    protected function mediate(array $files)
    {
        foreach ($files as $filename => $content) {
            $this->fileSystem->dumpFile($filename, $content);
        }
    }
}
