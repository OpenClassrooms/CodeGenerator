<?php declare(strict_types=1);

namespace OpenClassrooms\CodeGenerator\Commands;

use OpenClassrooms\CodeGenerator\Entities\FileObject;
use OpenClassrooms\CodeGenerator\Mediators\Args;
use OpenClassrooms\CodeGenerator\Mediators\Options;
use Symfony\Component\Console\Input\InputInterface;
use Symfony\Component\Console\Output\OutputInterface;
use Symfony\Component\Console\Question\Question;
use Symfony\Component\Console\Style\SymfonyStyle;

/**
 * @author Samuel Gomis <samuel.gomis@external.openclassrooms.com>
 */
trait CommandDisplayTrait
{
    protected function checkConfiguration($codeGeneratorConfig): void
    {
        $emptyParameters = [];
        foreach ($codeGeneratorConfig['parameters'] as $parameter => $value) {
            if (null === $value) {
                $emptyParameters[] = $parameter;
            }
        }
        if (!empty($emptyParameters) && count($emptyParameters) === 1) {
            throw new \ErrorException(
                'The parameter ' . array_shift($emptyParameters) . ' are empty in oc_code_generator.yml'
            );
        } elseif (!empty($emptyParameters)) {
            throw new \ErrorException(
                'The parameters ' . implode(', ', $emptyParameters) . ' are empty in oc_code_generator.yml'
            );
        }
    }

    protected function checkInputDomainAndNameArgument(
        InputInterface $input,
        OutputInterface $output,
        string $name
    ): void {
        if (null === $input->getArgument(Args::DOMAIN) || null === $input->getArgument($name)) {
            $helper = $this->getHelper('question');
            $domainQuestion = new Question('Please enter domain folders (ex: Domain\Subdomain): ', 'Domain\Subdomain');
            $useCaseQuestion = new Question('Please enter the class short name of the ' . $name . ': ', 'DefaultName');

            $input->setArgument(Args::DOMAIN, $helper->ask($input, $output, $domainQuestion));
            $input->setArgument($name, $helper->ask($input, $output, $useCaseQuestion));
        }
    }

    /**
     * @param FileObject[]
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
     * @param FileObject[]
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

    /**
     * @param FileObject[]
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
     * @param FileObject[]
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
     * @param InputInterface  $input
     * @param OutputInterface $output
     * @param                 $helper
     */
    protected function checkInputClassNameArgument(InputInterface $input, OutputInterface $output, string $name): void
    {
        if (null === $input->getArgument(Args::CLASS_NAME)) {
            $helper = $this->getHelper('question');
            $classNameQuestion = new Question('Please enter className : ', 'DefaultClassName');

            $input->setArgument(Args::CLASS_NAME, $helper->ask($input, $output, $classNameQuestion));
        }
    }
}
