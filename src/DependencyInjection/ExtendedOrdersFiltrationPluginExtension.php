<?php

namespace Ptb\ExtendedOrdersFiltrationPlugin\DependencyInjection;

use Symfony\Component\Config\FileLocator;
use Symfony\Component\DependencyInjection\ContainerBuilder;
use Symfony\Component\DependencyInjection\Extension\Extension;
use Symfony\Component\DependencyInjection\Extension\PrependExtensionInterface;
use Symfony\Component\DependencyInjection\Loader\YamlFileLoader;

class ExtendedOrdersFiltrationPluginExtension extends Extension implements PrependExtensionInterface
{
    public function load(array $configs, ContainerBuilder $container): void
    {
        $loader = new YamlFileLoader($container, new FileLocator(__DIR__ . '/../Resources/config'));

        $loader->load('services.yaml');
    }

    public function prepend(ContainerBuilder $container)
    {
        if ($container->hasExtension('twig')) {
            $container->prependExtensionConfig(
                'twig',
                ['paths' => [__DIR__ . '/../Resources/templates' => 'ExtendedOrdersFiltrationPlugin']],
            );
        }
    }
}
