<?php
declare(strict_types=1);

namespace PhpStrict\Widgets;

require_once 'vendor/autoload.php';

$storage = new \PhpStrict\WidgetsProvider\ArrayStorage([
    '' => [//scope for all pages, with mark
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

$provider = new MyWidgetsProvider1($storage);

/*
Widgets provider not know about special 'all pages' scope 
and can't merge widgets for asked scope and special scope.
*/
echo 'Using injection into consumer' . "\n";
echo '---' . "\n";
echo 'scope: /' . "\n";
$consumer = new MyWidgetsConsumer1('/');
$provider->setWidgets($consumer);
$consumer->renderWidgets('place1');
$consumer->renderWidgets('place2');
$consumer->renderWidgets('place3');
$consumer->renderWidgets('place4');
echo "\n";

echo 'scope: /page1' . "\n";
$consumer = new MyWidgetsConsumer1('/page1');
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

/*
Widgets consumer know about spectial scope 'all pages' 
and use method appendWidgets to append widgets for another scope 
instead of replacing they by setWidgets method.
*/
echo 'Using provider getters' . "\n";
echo '---' . "\n";
echo 'scope: /' . "\n";
$consumer = new MyWidgetsConsumer1();
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
$consumer = new MyWidgetsConsumer1();
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

/*
By default provider method getScopeWidgets returns widgets for all places, 
but it is possible to specify places.
*/
echo 'Using provider getters and specify places [place1, place4]' . "\n";
echo '---' . "\n";
echo 'scope: /page1' . "\n";
$consumer = new MyWidgetsConsumer1();
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
