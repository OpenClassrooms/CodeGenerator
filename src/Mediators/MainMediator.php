<?php

namespace OpenClassrooms\CodeGenerator\Mediators;

use OpenClassrooms\CodeGenerator\Generator\BusinessRules\UseCases\GetUseCaseGenerator;

/**
 * @author Romain Kuzniak <romain.kuzniak@openclassrooms.com>
 */
class MainMediator
{
    /**
     * @var \OpenClassrooms\CodeGenerator\Generator\BusinessRules\UseCases\GetUseCaseGenerator
     */
    private $getUseCaseGenerator;

    /**
     * @var \Symfony\Component\Filesystem\Filesystem
     */
    private $fileSystem;

    public function mediate(array $config = [])
    {
        $files = $this->getUseCaseGenerator->generate($className);
        foreach ($files as $filename => $content) {
            $this->fileSystem->dumpFile($filename, $content);
        }
    }

    public function setGetUseCaseGenerator(GetUseCaseGenerator $getUseCaseGenerator)
    {
        $this->getUseCaseGenerator = $getUseCaseGenerator;
    }

}
