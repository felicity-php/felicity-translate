<?php

/**
 * @author TJ Draper <tj@buzzingpixel.com>
 * @copyright 2017 BuzzingPixel, LLC
 * @license Apache-2.0
 */

namespace tests;

use felicity\config\Config;
use PHPUnit\Framework\TestCase;
use felicity\translate\Translate;

/**
 * Class TwigTest
 */
class TranslateTest extends TestCase
{
    public function testTranslate()
    {
        Config::set('lang.translations.en.testing', [
            'testVar' => 'en test value',
            'testVar2' => 'en test value 2',
        ]);

        Config::set('lang.translations.fr.testing', [
            'testVar' => 'fr test value',
            'testVar2' => 'fr test value 2',
        ]);

        Config::set('lang.translations.de.testing', [
            'testVar' => 'de test value',
            'testVar2' => 'de test value 2',
        ]);

        self::assertEquals(
            'en test value',
            Translate::get('testing', 'testVar')
        );

        self::assertEquals(
            'en test value 2',
            Translate::get('testing', 'testVar2')
        );

        Config::set('lang.defaultLocale', 'fr');

        self::assertEquals(
            'fr test value',
            Translate::get('testing', 'testVar')
        );

        self::assertEquals(
            'fr test value 2',
            Translate::get('testing', 'testVar2')
        );

        Config::set('lang.locale', 'de');

        self::assertEquals(
            'de test value',
            Translate::get('testing', 'testVar')
        );

        self::assertEquals(
            'de test value 2',
            Translate::get('testing', 'testVar2')
        );

        Config::set('lang.translations.en.testing', [
            'testVar' => 'en test value {{innerVar}}',
        ]);

        self::assertEquals(
            'en test value innerVal',
            Translate::get(
                'testing',
                'testVar',
                [
                    '{{innerVar}}' => 'innerVal'
                ],
                'en'
            )
        );

        Config::set('lang.locale', 'asdf');

        self::assertEquals(
            'fr test value',
            Translate::get('testing', 'testVar')
        );
    }
}
