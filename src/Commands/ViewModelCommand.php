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
    use CommandDisplayTrait;

    const CONFIG_DIR = __DIR__ . '/../Resources/config';

    const ROOT_DIR = __DIR__ . '/../../../../..';

    /**
     * @var ContainerBuilder
     */
    protected $container;

    /**
     * @var string
     */
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

    private function loadConfigParameters()
    {
        $loader = new YamlFileLoader($this->container, new FileLocator(static::ROOT_DIR));
        $loader->load('oc_code_generator.yml');
    }

    protected function configure()
    {
        $this
            ->setName(self::$defaultName)
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

        [$fileWritten, $fileNotWritten] = $this->getFilesWrittingStatus($fileObjects);

        $this->displayCreatedFilePath($fileWritten, $io);
        $this->displayNotWrittenFilePathAndContent($input, $fileNotWritten, $io);
        $this->displayFilePathAndContentDump($input, $io, array_merge($fileWritten, $fileNotWritten));

    }
}
