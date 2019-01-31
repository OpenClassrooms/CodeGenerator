<?php declare(strict_types=1);

namespace OpenClassrooms\CodeGenerator\Commands;

use OpenClassrooms\CodeGenerator\FileObjects\FileObject;
use OpenClassrooms\CodeGenerator\Mediators\Options;
use Symfony\Component\Console\Input\InputInterface;
use Symfony\Component\Console\Style\SymfonyStyle;

/**
 * @author Samuel Gomis <gomis.samuel@external.openclassrooms.com>
 */
trait CommandDisplayTrait
{
    /**
     * @param FileObject[]
     */
    private function displayCreatedFilePath(SymfonyStyle $io, array $fileObjects)
    {
        if (!empty($fileObjects)) {
            $io->success(CommandLabelType::GENERATED_OUTPUT);
            $pathList = [];
            foreach ($fileObjects as $fileObject) {
                $pathList[] = $fileObject->getPath();
            }
            $io->listing($pathList);
        }
    }

    /**
     * @param FileObject[]
     */
    private function displayFilePathAndContentDump(SymfonyStyle $io, array $fileObjects, InputInterface $input)
    {
        if (false !== $input->getOption(Options::DUMP)) {
            $io->success(CommandLabelType::DUMP_OUTPUT);
            foreach ($fileObjects as $fileObject) {
                $io->section($fileObject->getPath());
                $io->text($fileObject->getContent());
            }
        }
    }

    /**
     * @param FileObject[]
     */
    private function displayNotWrittenFilePathAndContent(SymfonyStyle $io, array $fileObjects, InputInterface $input)
    {
        if (!empty($fileObjects) && false === $input->getOption(Options::DUMP)) {
            $io->caution(CommandLabelType::ALREADY_EXIST_OUTPUT);
            foreach ($fileObjects as $fileObject) {
                if (!$fileObject->hasBeenWritten()) {
                    $io->section($fileObject->getPath());
                    $io->text($fileObject->getContent());
                }
            }
        }
    }

    /**
     * @param FileObject[]
     *
     * @return array
     */
    private function getFilesWritingStatus(array $fileObjects): array
    {
        $writtenFiles = [];
        $notWrittenFiles = [];
        foreach ($fileObjects as $fileObject) {
            if ($fileObject->hasBeenWritten()) {
                $writtenFiles[] = $fileObject;
            } else {
                $notWrittenFiles[] = $fileObject;
            }
        }

        return [$writtenFiles, $notWrittenFiles];
    }
}
