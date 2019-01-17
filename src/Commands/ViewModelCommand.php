<?php declare(strict_types=1);

namespace OpenClassrooms\CodeGenerator\Commands;

use OpenClassrooms\CodeGenerator\Mediators\Args;
use OpenClassrooms\CodeGenerator\Mediators\Options;
use Symfony\Component\Config\FileLocator;
use Symfony\Component\Console\Command\Command;
use Symfony\Component\Console\Input\InputArgument;
use Symfony\Component\Console\Input\InputInterface;
use Symfony\Component\Console\Input\InputOption;
use Symfony\Component\Console\Output\OutputInterface;
use Symfony\Component\Console\Style\SymfonyStyle;
use Symfony\Component\DependencyInjection\ContainerBuilder;
use Symfony\Component\DependencyInjection\Loader\XmlFileLoader;
use Symfony\Component\DependencyInjection\Loader\YamlFileLoader;

/**
 * @author Samuel Gomis <gomis.samuel@external.openclassrooms.com>
 */
class ViewModelCommand extends Command
{
    const CONFIG_DIR = __DIR__ . '/../Resources/config';

    const ROOT_DIR = __DIR__ . '/../..';

    /**
     * @var ContainerBuilder
     */
    private $container;

    protected static $defaultName = 'code-generator:viewmodels';

    public function __construct($name = null)
    {
        parent::__construct($name);
        $this->container = new ContainerBuilder();
        $loader = new XmlFileLoader($this->container, new FileLocator(self::CONFIG_DIR));
        $loader->load('services.xml');
        $this->loadConfigParameters();
        $this->container->compile();

    }

    public function loadConfigParameters()
    {
        $loader = new YamlFileLoader($this->container, new FileLocator(self::ROOT_DIR));
        $loader->load('oc_code_generator.yml');
    }

    protected function configure()
    {
        $this
            ->setDescription('Create view model architecture')
            ->setHelp('This command allows you to create view model architecture')
            ->addArgument(
                Args::CLASS_NAME,
                InputArgument::REQUIRED,
                'reference class name'
            )
            ->addOption(
                Options::NO_TEST,
                null,
                InputOption::VALUE_OPTIONAL,
                'Without test',
                false
            )
            ->addOption(
                Options::TESTS_ONLY,
                null,
                InputOption::VALUE_OPTIONAL,
                'Only test',
                false
            )
            ->addOption(
                Options::DUMP,
                null,
                InputOption::VALUE_OPTIONAL,
                'Dump',
                false
            );

    }

    protected function execute(InputInterface $input, OutputInterface $output)
    {

        $fileObjects = $this->container
            ->get('open_classrooms.code_generator.mediators.api.impl.view_model_mediator_impl')
            ->mediate($input->getArguments(), $input->getOptions());

        $io = new SymfonyStyle($input, $output);

        $this->displayCreatedFilePath($fileObjects, $io);
        $this->displayFilePathAndContentDump($input, $io, $fileObjects);
        $this->displayNotWrittenFilePathAndContent($input, $fileObjects, $io);

    }

    private function displayCreatedFilePath(array $fileObjects, SymfonyStyle $io)
    {
        if ($this->writtenFilesExist($fileObjects)) {
            $io->success(CommandLabelType::GENERATED_OUTPUT);
            $pathList = [];
            foreach ($fileObjects as $fileObject) {
                $pathList[] = $fileObject->getPath();
            }
            $io->listing($pathList);
        }
    }

    private function writtenFilesExist(array $fileObjects): bool
    {
        foreach ($fileObjects as $fileObject) {
            if ($fileObject->hasBeenWritten()) {
                return true;
            }
        }

        return false;
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
        if (!$this->writtenFilesExist($fileObjects) && false === $input->getOption(Options::DUMP)) {
            $io->caution(CommandLabelType::ALREADY_EXIST_OUTPUT);
            foreach ($fileObjects as $fileObject) {
                if (!$fileObject->hasBeenWritten()) {
                    $io->section($fileObject->getPath());
                    $io->text($fileObject->getContent());
                }
            }
        }
    }
}
