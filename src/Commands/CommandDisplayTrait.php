<?php declare(strict_types=1);

namespace OpenClassrooms\CodeGenerator\Commands;

use OpenClassrooms\CodeGenerator\Entities\Object\FileObject;
use OpenClassrooms\CodeGenerator\Mediators\Options;
use Symfony\Component\Console\Input\InputInterface;
use Symfony\Component\Console\Output\OutputInterface;
use Symfony\Component\Console\Style\SymfonyStyle;

trait CommandDisplayTrait
{
    /**
     * @param FileObject[] $fileObjects
     */
    protected function commandDisplay(InputInterface $input, OutputInterface $output, $fileObjects): void
    {
        $io = new SymfonyStyle($input, $output);

        [$writtenFiles, $notWrittenFiles] = $this->getFilesWritingStatus($fileObjects);

        $this->displayCreatedFilePath($io, $writtenFiles);
        $this->displayNotWrittenFilePathAndContent($io, $notWrittenFiles, $input);
        $this->displayFilePathAndContentDump($io, array_merge($writtenFiles, $notWrittenFiles), $input);
    }

    /**
     * @param FileObject[] $fileObjects
     *
     * @return array
     */
    protected function getFilesWritingStatus(array $fileObjects): array
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

    /**
     * @param FileObject[] $fileObjects
     */
    protected function displayCreatedFilePath(SymfonyStyle $io, array $fileObjects): void
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
     * @param FileObject[] $fileObjects
     */
    protected function displayNotWrittenFilePathAndContent(
        SymfonyStyle $io,
        array $fileObjects,
        InputInterface $input
    ): void {
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
     * @param FileObject[] $fileObjects
     */
    protected function displayFilePathAndContentDump(SymfonyStyle $io, array $fileObjects, InputInterface $input): void
    {
        if (false !== $input->getOption(Options::DUMP)) {
            $io->success(CommandLabelType::DUMP_OUTPUT);
            foreach ($fileObjects as $fileObject) {
                $io->section($fileObject->getPath());
                $io->text($fileObject->getContent());
            }
        }
    }
}
