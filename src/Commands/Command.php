<?php

namespace OpenClassrooms\CodeGenerator\Commands;

use Symfony\Component\Config\FileLocator;
use Symfony\Component\DependencyInjection\ContainerBuilder;
use Symfony\Component\DependencyInjection\Loader\XmlFileLoader;

/**
 * @author Romain Kuzniak <romain.kuzniak@openclassrooms.com>
 */
class Command
{
    public static function main()
    {
        $container = new ContainerBuilder();
        $loader = new XmlFileLoader($container, new FileLocator(__DIR__.'/../Resources/config'));
        $loader->load('services.xml');
        print ('yes');
    }
}
