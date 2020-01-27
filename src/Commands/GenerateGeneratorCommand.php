<?php

declare(strict_types=1);

namespace OpenClassrooms\CodeGenerator\Commands;

use OpenClassrooms\CodeGenerator\Mediators\Args;
use OpenClassrooms\CodeGenerator\Mediators\Options;
use Symfony\Component\Config\FileLocator;
use Symfony\Component\Console\Input\InputArgument;
use Symfony\Component\Console\Input\InputInterface;
use Symfony\Component\Console\Input\InputOption;
use Symfony\Component\Console\Output\OutputInterface;
use Symfony\Component\DependencyInjection\ContainerBuilder;
use Symfony\Component\DependencyInjection\Loader\XmlFileLoader;

class GenerateGeneratorCommand extends AbstractCommand
{
    /**
     * @var string
     */
    protected static $defaultName = 'code-generator:generate-generator';

    public function __construct($name = null)
    {
        parent::__construct($name);
        $this->container = new ContainerBuilder();
        $loader = new XmlFileLoader($this->container, new FileLocator(self::CONFIG_DIR));
        $loader->load('generate_generator.xml');
        $this->loadConfigParameters();
        $this->container->compile();
    }

    protected function configure()
    {
        $this
            ->setName(self::$defaultName)
            ->setDescription('Create needed classes to add new generator')
            ->setHelp('This command allows you to create new generator')
            ->addArgument(Args::DOMAIN, InputArgument::OPTIONAL, 'set Domain/SubDomain')
            ->addArgument(Args::ENTITY, InputArgument::OPTIONAL, 'set Entity name')
            ->addOption(
                Options::CONSTRUCTION_PATTERN,
                null,
                InputOption::VALUE_REQUIRED,
                'choose construction pattern Skeleton model',
                ConstructionPatternType::ASSEMBLER_PATTERN
            );
        $this->configureOptions();
    }

    protected function execute(InputInterface $input, OutputInterface $output)
    {
        $codeGeneratorConfig = $this->parseConfigFile();
        $this->checkConfiguration($codeGeneratorConfig);
        $this->checkInputDomainAndNameArgument($input, $output, Args::ENTITY);

        $fileObjects = $this->container
            ->get('open_classrooms.code_generator.mediators.generate_generator.generate_generator_mediator')
            ->mediate($input->getArguments(), $input->getOptions());

        $this->commandDisplay($input, $output, $fileObjects);
    }
}
