<?php
declare(strict_types=1);

namespace PhpStrict\Widgets;

ini_set('display_errors', '1');
ini_set('error_reporting', (string) E_ALL);
ini_set('scream.enabled', '1');
date_default_timezone_set('Europe/Moscow');
setlocale(LC_ALL, 'ru_RU.utf-8', 'rus_RUS.utf-8', 'ru_RU.utf8');
mb_internal_encoding('UTF-8');

require_once 'vendor/autoload.php';

$storage = new \PhpStrict\WidgetsProvider\ArrayStorage([
    '' => [//scope for all pages
        'place1' => [
            ['mark' => 'all'],
        ],
        'place4' => [
            ['mark' => 'all'],
        ],
    ],
    
    '/' => [
        'place1' => [
            [],
            [],
            [],
            [],
        ],
        'place2' => [
            [],
            [],
        ],
    ],
    
    '/page1' => [
        'place1' => [
            [],
            [],
        ],
        'place3' => [
            [],
            [],
            [],
        ],
    ],
]);

$provider = new MyWidgetsProvider($storage);

echo 'Using injection into consumer' . "\n";
echo '---' . "\n";
echo 'scope: /' . "\n";
$consumer = new MyWidgetsConsumer('/');
$provider->setWidgets($consumer);
$consumer->renderWidgets('place1');
$consumer->renderWidgets('place2');
$consumer->renderWidgets('place3');
$consumer->renderWidgets('place4');
echo "\n";

echo 'scope: /page1' . "\n";
$consumer = new MyWidgetsConsumer('/page1');
$provider->setWidgets($consumer);
$consumer->renderWidgets('place1');
$consumer->renderWidgets('place2');
$consumer->renderWidgets('place3');
$consumer->renderWidgets('place4');
echo '---' . "\n";
echo 'Widgets for scope `all pages` was not showed' . "\n";

echo "\n";
echo '======' . "\n";
echo "\n";

echo 'Using provider getters' . "\n";
echo '---' . "\n";
echo 'scope: /' . "\n";
$consumer = new MyWidgetsConsumer();
$provider->flushWidgets();
$consumer->setWidgets($provider->getScopeWidgets(''));
$provider->flushWidgets();
$consumer->appendWidgets($provider->getScopeWidgets('/'));
$consumer->renderWidgets('place1');
$consumer->renderWidgets('place2');
$consumer->renderWidgets('place3');
$consumer->renderWidgets('place4');
echo "\n";

echo 'scope: /page1' . "\n";
$consumer = new MyWidgetsConsumer();
$provider->flushWidgets();
$consumer->setWidgets($provider->getScopeWidgets(''));
$provider->flushWidgets();
$consumer->appendWidgets($provider->getScopeWidgets('/page1'));
$consumer->renderWidgets('place1');
$consumer->renderWidgets('place2');
$consumer->renderWidgets('place3');
$consumer->renderWidgets('place4');
echo '---' . "\n";
echo 'Widgets for scope `all pages` was showed' . "\n";

echo "\n";
echo '======' . "\n";
echo "\n";

echo 'Using provider getters and specify places [place1, place4]' . "\n";
echo '---' . "\n";
echo 'scope: /page1' . "\n";
$consumer = new MyWidgetsConsumer();
$provider->flushWidgets();
$consumer->setWidgets($provider->getScopeWidgets('', ['place1', 'place4']));
$provider->flushWidgets();
$consumer->appendWidgets($provider->getScopeWidgets('/page1', ['place1', 'place4']));
$consumer->renderWidgets('place1');
$consumer->renderWidgets('place2');
$consumer->renderWidgets('place3');
$consumer->renderWidgets('place4');
echo '---' . "\n";
echo 'Widgets for scope `all pages` was showed' . "\n";
