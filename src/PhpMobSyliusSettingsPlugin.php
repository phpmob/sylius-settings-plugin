<?php

declare(strict_types=1);

namespace PhpMob\SyliusSettingsPlugin;

use PhpMob\SyliusSettingsPlugin\DependencyInjection\PhpMobSyliusSettingsExtension;
use Sylius\Bundle\CoreBundle\Application\SyliusPluginTrait;
use Symfony\Component\HttpKernel\Bundle\Bundle;

final class PhpMobSyliusSettingsPlugin extends Bundle
{
    use SyliusPluginTrait;

    /**
     * {@inheritdoc}
     */
    public function getContainerExtension()
    {
        return new PhpMobSyliusSettingsExtension();
    }

    /**
     * {@inheritdoc}
     */
    protected function getBundlePrefix(): string
    {
        return $this->extension->getAlias();
    }
}
