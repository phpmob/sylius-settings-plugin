<?php

declare(strict_types=1);

namespace PhpMob\SyliusSettingsPlugin;

use Sylius\Component\User\Model\UserInterface;

interface SettingContextInterface
{
    /**
     * @param string $path
     * @param null|UserInterface $user
     *
     * @return mixed
     */
    public function get(string $path, ?UserInterface $user = null);

    /**
     * @param string $path
     * @param null|UserInterface $user
     *
     * @return mixed
     */
    public function getLocalized(string $path, ?UserInterface $user = null);
}
