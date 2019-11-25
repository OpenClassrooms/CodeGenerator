<?php declare(strict_types=1);

namespace OpenClassrooms\CodeGenerator\Commands;

use OpenClassrooms\CodeGenerator\Mediators\Args;
use Symfony\Component\Config\FileLocator;
use Symfony\Component\Console\Input\InputArgument;
use Symfony\Component\Console\Input\InputInterface;
use Symfony\Component\Console\Output\OutputInterface;
use Symfony\Component\DependencyInjection\ContainerBuilder;
use Symfony\Component\DependencyInjection\Loader\XmlFileLoader;

/**
 * @author Samuel Gomis <samuel.gomis@external.openclassrooms.com>
 */
class GetEntityUseCaseCommand extends AbstractCommand
{
    /**
     * @var string
     */
    protected static $defaultName = 'code-generator:get-entity-use-case';

    public function __construct($name = null)
    {
        parent::__construct($name);
        $this->container = new ContainerBuilder();
        $loader = new XmlFileLoader($this->container, new FileLocator(self::CONFIG_DIR));
        $loader->load('get_entity_use_case_services.xml');
        $this->loadConfigParameters();
        $this->container->compile();
    }

    protected function configure()
    {
        $this
            ->setName(self::$defaultName)
            ->setDescription('Create get entity use case architecture')
            ->setHelp('This command allows you to create get entity use case architecture')
            ->addArgument(Args::CLASS_NAME, InputArgument::OPTIONAL, 'set entity class name');
        $this->configureOptions();
    }

    protected function execute(InputInterface $input, OutputInterface $output)
    {
        $this->checkConfiguration();
        $this->checkInputClassNameArgument($input, $output);

        $fileObjects = $this->container
            ->get('open_classrooms.code_generator.mediators.business_rules.use_cases.get_entity_use_case_mediator')
            ->mediate($input->getArguments(), $input->getOptions());

        $this->commandDisplay($input, $output, $fileObjects);
    }
}
