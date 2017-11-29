<?php

/**
 * @author TJ Draper <tj@buzzingpixel.com>
 * @copyright 2017 BuzzingPixel, LLC
 * @license Apache-2.0
 */

namespace felicity\translate;

use felicity\config\Config;

/**
 * Class Bootstrap
 */
class Bootstrap
{
    public function run()
    {
        if (! class_exists('\felicity\twig\Twig')) {
            return;
        }

        $twigEnv = \felicity\twig\Twig::get();

        $function = function (
            string $key,
            string $category = '',
            array $vars = [],
            string $locale = ''
        ) {
            $category = $category ?:
                Config::get('lang.defaultTwigCategory', 'dev');

            return Translate::get($category, $key, $vars, $locale);
        };

        $twigEnv->addFunction(new \Twig_function('translate', $function));

        $twigEnv->addFilter(new \Twig_Filter('translate', $function));
    }
}
