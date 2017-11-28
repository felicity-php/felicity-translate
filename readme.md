## About Felicity Translate

Felicity translate provides a way to set and get translations in PHP

## Usage

Set your locale, default locale, and translations with Felicity Config and then use the translation class to get your translations.

```php
<?php

use felicity\config\Config;
use felicity\translate\Translate;

Config::set('lang.defaultLocale', 'en');
Config::set('lang.locale', 'de');

Config::set('lang.translations.en.myCategory', [
    'myTranslationKey' => 'Translation of something',
    'anotherTranslationKey' => 'Translation of something with {{var}}',
]);

Config::set('lang.translations.de.myCategory', [
    'myTranslationKey' => 'Übersetzung von etwas',
    'anotherTranslationKey' => 'Übersetzung von etwas mit {{var}}',
]);

$myTranslation = Translate::get('myCategory', 'myTranslationKey');
$anotherTranslation = Translate::get('myCategory', 'anotherTranslationKey', [
    '{{var}}' => 'someVal',
]);
```

## License

Copyright 2017 BuzzingPixel, LLC

Licensed under the Apache License, Version 2.0 (the "License");
you may not use this file except in compliance with the License.
You may obtain a copy of the License at [http://www.apache.org/licenses/LICENSE-2.0](http://www.apache.org/licenses/LICENSE-2.0).

Unless required by applicable law or agreed to in writing, software
distributed under the License is distributed on an "AS IS" BASIS,
WITHOUT WARRANTIES OR CONDITIONS OF ANY KIND, either express or implied.
See the License for the specific language governing permissions and
limitations under the License.
