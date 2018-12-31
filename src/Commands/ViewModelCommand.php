<?php declare(strict_types=1);

namespace OpenClassrooms\CodeGenerator\Commands;

use OpenClassrooms\CodeGenerator\Mediators\Args;
use OpenClassrooms\CodeGenerator\Mediators\Options;
use Symfony\Component\Config\FileLocator;
use Symfony\Component\Console\Command\Command;
use Symfony\Component\Console\Input\InputArgument;
use Symfony\Component\Console\Input\InputInterface;
use Symfony\Component\Console\Output\OutputInterface;
use Symfony\Component\DependencyInjection\ContainerBuilder;
use Symfony\Component\DependencyInjection\Loader\XmlFileLoader;
use Symfony\Component\Finder\Finder;

/**
 * @author Samuel Gomis <gomis.samuel@external.openclassrooms.com>
 */
class ViewModelCommand extends Command
{
    const CONFIG_DIR = __DIR__ . '/../Resources/config';

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
        $this->loadConfigFile($loader);
        $this->container->compile();

    }

    private function loadConfigFile(XmlFileLoader $loader)
    {
        $finder = new Finder();
        $finder->files()->in(self::CONFIG_DIR);

        foreach ($finder as $file) {
            $loader->load($file->getRelativePathname());
        }
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
            ->addOption(Options::NO_TEST, null, InputArgument::OPTIONAL)
            ->addOption(Options::TESTS_ONLY, null, InputArgument::OPTIONAL)
            ->addOption(Options::DUMP, null, InputArgument::OPTIONAL);

    }

    protected function execute(InputInterface $input, OutputInterface $output)
    {
        $fileObjects = $this->container
            ->get('open_classrooms.code_generator.mediators.api.impl.view_model_mediator_impl')
            ->mediate($input->getArguments(), $input->getOptions());
    }
}
