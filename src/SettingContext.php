<?php

declare(strict_types=1);

namespace PhpMob\SyliusSettingsPlugin;

use PhpMob\Settings\Manager\SettingManagerInterface;
use Sylius\Component\Locale\Context\LocaleContextInterface;
use Sylius\Component\User\Model\UserInterface;

class SettingContext implements SettingContextInterface
{
    /**
     * @var SettingManagerInterface
     */
    private $settings;

    /**
     * @var LocaleContextInterface
     */
    private $localeContext;

    /**
     * @var string
     */
    private $localeCode;

    public function __construct(SettingManagerInterface $settings, LocaleContextInterface $localeContext)
    {
        $this->settings = $settings;
        $this->localeContext = $localeContext;
    }

    /**
     * @return string
     */
    private function getLocaleCode(): string
    {
        return $this->localeCode ?? $this->localeCode = $this->localeContext->getLocaleCode();
    }

    /**
     * {@inheritdoc}
     */
    public function get(string $path, ?UserInterface $user = null)
    {
        return $this->settings->get($path, $user);
    }

    /**
     * {@inheritdoc}
     */
    public function getLocalized(string $path, ?UserInterface $user = null)
    {
        $result = $this->get($path, $user);

        if (is_array($result) && isset($result[$this->getLocaleCode()])) {
            return $result[$this->getLocaleCode()];
        }

        return $result;
    }
}
