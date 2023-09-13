<?php

declare(strict_types=1);

namespace Ptb\ExtendedOrdersFiltrationPlugin;

use Ptb\ExtendedOrdersFiltrationPlugin\DependencyInjection\ExtendedOrdersFiltrationPluginExtension;
use Sylius\Bundle\CoreBundle\Application\SyliusPluginTrait;
use Symfony\Component\DependencyInjection\Extension\ExtensionInterface;
use Symfony\Component\HttpKernel\Bundle\Bundle;

final class ExtendedOrdersFiltrationPlugin extends Bundle
{
    use SyliusPluginTrait;

    public function getContainerExtension(): ExtensionInterface
    {
        $this->extension = new ExtendedOrdersFiltrationPluginExtension();

        return $this->extension;
    }
}
