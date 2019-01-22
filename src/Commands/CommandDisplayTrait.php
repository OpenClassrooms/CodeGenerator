<?php declare(strict_types=1);

namespace OpenClassrooms\CodeGenerator\Commands;

use OpenClassrooms\CodeGenerator\Mediators\Options;
use Symfony\Component\Console\Input\InputInterface;
use Symfony\Component\Console\Style\SymfonyStyle;

/**
 * @author Samuel Gomis <gomis.samuel@external.openclassrooms.com>
 */
trait CommandDisplayTrait
{
    private function displayCreatedFilePath(array $fileObjects, SymfonyStyle $io)
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

    private function displayFilePathAndContentDump(InputInterface $input, SymfonyStyle $io, array $fileObjects)
    {
        if (false !== $input->getOption(Options::DUMP)) {
            $io->success(CommandLabelType::DUMP_OUTPUT);
            foreach ($fileObjects as $fileObject) {
                $io->section($fileObject->getPath());
                $io->text($fileObject->getContent());
            }
        }
    }

    private function displayNotWrittenFilePathAndContent(
        InputInterface $input,
        array $fileObjects,
        SymfonyStyle $io
    ): void
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

    private function getFilesWrittingStatus(array $fileObjects): array
    {
        $fileWritten = [];
        $fileNotWritten = [];
        foreach ($fileObjects as $fileObject) {
            if ($fileObject->hasBeenWritten()) {
                $fileWritten[] = $fileObject;
            } else {
                $fileNotWritten[] = $fileObject;
            }
        }

        return [$fileWritten, $fileNotWritten];
    }
}
