<?php

namespace OpenClassrooms\CodeGenerator\Commands;

use Symfony\Component\Config\FileLocator;
use Symfony\Component\Console\Command\Command;
use Symfony\Component\Console\Input\InputArgument;
use Symfony\Component\Console\Input\InputInterface;
use Symfony\Component\Console\Output\OutputInterface;
use Symfony\Component\DependencyInjection\ContainerBuilder;
use Symfony\Component\DependencyInjection\Loader\XmlFileLoader;

/**
 * @author Romain Kuzniak <romain.kuzniak@openclassrooms.com>
 */
class UseCaseCommand extends Command
{
    const CLASS_NAME = 'class-name';

    /**
     * @var \Symfony\Component\DependencyInjection\ContainerBuilder
     */
    private $container;

    public function __construct($name = null)
    {
        parent::__construct($name);
        $this->container = new ContainerBuilder();
        $loader = new XmlFileLoader($this->container, new FileLocator(__DIR__.'/../Resources/config'));
        $loader->load('services.xml');

    }

    protected function configure()
    {
        $this->setName('code-generator:use-case');
        $this->addArgument(self::CLASS_NAME, InputArgument::REQUIRED)->addArgument(
            'with-response',
            InputArgument::OPTIONAL
        );


    }

    protected function execute(InputInterface $input, OutputInterface $output)
    {
        $class = $this->container
            ->get('open_classrooms.code_generator.generator.business_rules.use_cases.use_case_generator')
            ->generate(
                $input->getArgument(self::CLASS_NAME)
            );
        var_dump($class);
        $output->write('yeah');
    }
}
