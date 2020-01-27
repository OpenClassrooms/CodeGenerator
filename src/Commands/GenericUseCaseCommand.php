<?php

declare(strict_types=1);

namespace OpenClassrooms\CodeGenerator\Commands;

use OpenClassrooms\CodeGenerator\Mediators\Args;
use Symfony\Component\Config\FileLocator;
use Symfony\Component\Console\Input\InputArgument;
use Symfony\Component\Console\Input\InputInterface;
use Symfony\Component\Console\Output\OutputInterface;
use Symfony\Component\DependencyInjection\ContainerBuilder;
use Symfony\Component\DependencyInjection\Loader\XmlFileLoader;

class GenericUseCaseCommand extends AbstractCommand
{
    /**
     * @var string
     */
    protected static $defaultName = 'code-generator:generic-use-case';

    public function __construct($name = null)
    {
        parent::__construct($name);
        $this->container = new ContainerBuilder();
        $loader = new XmlFileLoader($this->container, new FileLocator(self::CONFIG_DIR));
        $loader->load('generic_use_case_services.xml');
        $this->loadConfigParameters();
        $this->container->compile();
    }

    protected function configure()
    {
        $this
            ->setName(self::$defaultName)
            ->setDescription('Create generic use case architecture')
            ->setHelp('This command allows you to create generic use case architecture')
            ->addArgument(Args::DOMAIN, InputArgument::OPTIONAL, 'set Domain/SubDomain')
            ->addArgument(Args::USE_CASE, InputArgument::OPTIONAL, 'set UseCase name');
        $this->configureOptions();
    }

    protected function execute(InputInterface $input, OutputInterface $output)
    {
        $codeGeneratorConfig = $this->parseConfigFile();
        $this->checkConfiguration($codeGeneratorConfig);
        $this->checkInputDomainAndNameArgument($input, $output, Args::USE_CASE);

        $fileObjects = $this->container
            ->get('open_classrooms.code_generator.mediators.business_rules.use_case_mediator')
            ->mediate($input->getArguments(), $input->getOptions());

        $this->commandDisplay($input, $output, $fileObjects);
    }
}
