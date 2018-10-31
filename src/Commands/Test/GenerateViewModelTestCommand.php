<?php

namespace OpenClassrooms\CodeGenerator\Commands\Test;

use OpenClassrooms\CodeGenerator\Generator\Tests\Api\ViewModels\DTO\Request\ViewModelTestGeneratorAssemblerImpl;
use OpenClassrooms\CodeGenerator\Generator\Tests\Api\ViewModels\DTO\Request\ViewModelTestGeneratorRequestBuilderImpl;
use Symfony\Component\Config\FileLocator;
use Symfony\Component\Console\Command\Command;
use Symfony\Component\Console\Input\InputInterface;
use Symfony\Component\Console\Output\OutputInterface;
use Symfony\Component\DependencyInjection\ContainerBuilder;
use Symfony\Component\DependencyInjection\Loader\XmlFileLoader;

/**
 * @author Samuel Gomis <samuel.gomis@external.openclassrooms.com>
 */
class GenerateViewModelTestCommand extends Command
{
    const HELP = 'help';

    /**
     * @var ContainerBuilder
     */
    private $container;

    public function __construct($name = null)
    {
        parent::__construct($name);
        $this->container = new ContainerBuilder();
        $loader = new XmlFileLoader($this->container, new FileLocator(__DIR__.'/../Resources/config'));
        $loader->load('test.xml');

    }

    protected function configure()
    {
        $this
            ->setName('code-generator:viewmodels-test')
            ->setDescription('generate tests for view models')
            ->setHelp(self::HELP);
    }

    protected function execute(InputInterface $input, OutputInterface $output)
    {
        //step 1 : build request
        //step 2 : generate skeleton model with response builded
        //step 3 : skeleton model use a assembler to be build

        $request = new ViewModelTestGeneratorRequestBuilderImpl();
        $request->create()->build();

        $this->container->get('open_classrooms.code_generator.generator.tests.api.view_models.view_model_test_generator')
            ->generate();
    }

}
