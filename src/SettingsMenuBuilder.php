<?php

declare(strict_types=1);

namespace PhpMob\SyliusSettingsPlugin;

use Sylius\Bundle\UiBundle\Menu\Event\MenuBuilderEvent;

final class SettingsMenuBuilder
{
    /**
     * @var array
     */
    private $menus = [];

    public function __construct(array $menus)
    {
        $this->menus = $menus;
    }

    /**
     * @param MenuBuilderEvent $menuBuilderEvent
     */
    public function buildMenu(MenuBuilderEvent $menuBuilderEvent): void
    {
        $menu = $menuBuilderEvent->getMenu();

        $cmsRootMenuItem = $menu
            ->addChild('phpmob_settings')
            ->setLabel('phpmob_sylius_settings_plugin.ui.settings');

        foreach ($this->menus as $section => $menu) {
            $cmsRootMenuItem
                ->addChild($section, [
                    'route' => 'phpmob_admin_settings',
                    'routeParameters' => ['section' => $section]
                ])
                ->setLabel($menu['label'])
                ->setLabelAttribute('icon', $menu['icon']);
        }
    }
}
