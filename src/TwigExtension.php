<?php

declare(strict_types=1);

namespace PhpMob\SyliusSettingsPlugin;

class TwigExtension extends \Twig_Extension
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
     * {@inheritdoc}
     */
    public function getFunctions()
    {
        return [
            new \Twig_SimpleFunction('phpmob_sylius_settings_plugin_menu_icon', [$this, 'findMenuIcon']),
        ];
    }

    /**
     * @param string $section
     *
     * @return string
     */
    public function findMenuIcon(string $section): string
    {
        if (!array_key_exists($section, $this->menus)) {
            return 'file';
        }

        return $this->menus[$section]['icon'];
    }
}
