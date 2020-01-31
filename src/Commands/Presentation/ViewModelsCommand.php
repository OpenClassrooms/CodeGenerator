<?php

declare(strict_types=1);

namespace OpenClassrooms\CodeGenerator\Commands\Presentation;

use OpenClassrooms\CodeGenerator\Commands\AbstractCommand;
use OpenClassrooms\CodeGenerator\Mediators\Args;
use Symfony\Component\Config\FileLocator;
use Symfony\Component\Console\Input\InputArgument;
use Symfony\Component\Console\Input\InputInterface;
use Symfony\Component\Console\Output\OutputInterface;
use Symfony\Component\DependencyInjection\ContainerBuilder;
use Symfony\Component\DependencyInjection\Loader\XmlFileLoader;

class ViewModelsCommand extends AbstractCommand
{
    /**
     * @var string
     */
    protected static $defaultName = 'code-generator:view-models';

    public function __construct($name = null)
    {
        parent::__construct($name);
        $this->container = new ContainerBuilder();
        $loader = new XmlFileLoader($this->container, new FileLocator(self::CONFIG_DIR));
        $loader->load('view_model_services.xml');
        $this->loadConfigParameters();
        $this->container->compile();
    }

    protected function configure()
    {
        $this
            ->setName(self::$defaultName)
            ->setDescription('Create view model architecture')
            ->setHelp('This command allows you to create view model architecture')
            ->addArgument(
                Args::CLASS_NAME,
                InputArgument::OPTIONAL,
                'Use Case Response Classname'
            );
        $this->configureOptions();
    }

    protected function execute(InputInterface $input, OutputInterface $output)
    {
        $codeGeneratorConfig = $this->parseConfigFile();
        $this->checkConfiguration($codeGeneratorConfig);
        $this->checkInputClassNameArgument($input, $output);

        $fileObjects = $this->container
            ->get('open_classrooms.code_generator.mediators.api.view_model_mediator')
            ->mediate($input->getArguments(), $input->getOptions());

        $this->commandDisplay($input, $output, $fileObjects);
    }
}
