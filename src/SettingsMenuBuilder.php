<?php

declare(strict_types=1);

namespace PhpMob\SyliusSettingsPlugin;

use Sylius\Bundle\UiBundle\Menu\Event\MenuBuilderEvent;

final class SettingsMenuBuilder
{
    /**
     * @param MenuBuilderEvent $menuBuilderEvent
     */
    public function buildMenu(MenuBuilderEvent $menuBuilderEvent): void
    {
        $menu = $menuBuilderEvent->getMenu();

        $cmsRootMenuItem = $menu
            ->addChild('phpmob_settings')
            ->setLabel('phpmob_sylius_settings_plugin.ui.settings')
        ;

        $cmsRootMenuItem
            ->addChild('systems', [
                'route' => 'phpmob_sylius_settings_plugin_admin_systems'
            ])
            ->setLabel('phpmob_sylius_settings_plugin.ui.systems')
            ->setLabelAttribute('icon', 'cog')
        ;
    }
}
