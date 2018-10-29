<?php

namespace OpenClassrooms\CodeGenerator\Commands\Test;

use Symfony\Component\Config\FileLocator;
use Symfony\Component\Console\Command\Command;
use Symfony\Component\Console\Input\InputInterface;
use Symfony\Component\Console\Output\OutputInterface;
use Symfony\Component\DependencyInjection\ContainerBuilder;
use Symfony\Component\DependencyInjection\Loader\XmlFileLoader;

/**
 * @author Romain Kuzniak <romain.kuzniak@openclassrooms.com>
 */
class GenerateViewModelTestCommand extends Command
{
    const HELP = 'help';

    protected function configure()
    {
        $this
            ->setName('code-generator:viewmodels')
            ->setDescription('generate tests for view models')
            ->setHelp(self::HELP);
    }

    protected function execute(InputInterface $input, OutputInterface $output)
    {

        $output->write('ok');
    }

}
