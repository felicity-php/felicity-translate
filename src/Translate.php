<?php

/**
 * @author TJ Draper <tj@buzzingpixel.com>
 * @copyright 2017 BuzzingPixel, LLC
 * @license Apache-2.0
 */

namespace felicity\translate;

use felicity\config\Config;

/**
 * Class Translate
 */
class Translate
{
    /**
     * Get's a translation
     * @param string $category
     * @param string $key
     * @param array $vars
     * @param string $locale
     * @return string
     */
    public static function get(
        string $category,
        string $key,
        array $vars = [],
        string $locale = ''
    ) : string {
        $fallBackLocale = Config::get('lang.defaultLocale', 'en');

        if (! $locale) {
            $locale = Config::get(
                'lang.locale',
                Config::get('lang.defaultLocale', 'en')
            );
        }

        $fullKey = "lang.translations.{$locale}.{$category}.{$key}";
        $fallBackKey = "lang.translations.{$fallBackLocale}.{$category}.{$key}";

        $tr = Config::get($fullKey, Config::get($fallBackKey));

        if (! $tr || ! $vars) {
            return $tr ?? '';
        }

        $tr = strtr($tr, $vars);

        return $tr ?? '';
    }


    /**
     * Get's a translation
     * @param string $category
     * @param string $key
     * @param array $vars
     * @param string $locale
     * @return string
     */
    public function getTranslation(
        string $category,
        string $key,
        array $vars = [],
        string $locale = ''
    ) : string {
        return self::get($category, $key, $vars, $locale);
    }
}
