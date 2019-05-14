<?php
declare(strict_types=1);

namespace PhpStrict\Widgets;

require_once 'vendor/autoload.php';

$storage = new \PhpStrict\WidgetsProvider\ArrayStorage([
    '/' => [
        'place1' => [
            [
                'title' => 'Widget: scope /; place: place1.',
                'producer' => '\PhpStrict\Widgets\RandomTextWidgetsProducer',
            ],
        ],
    ],
]);

//init provider with storage
$provider = new MyWidgetsProvider2($storage);

//init consumer with scope
$consumer = new MyWidgetsConsumer1('/');

//pass consumer into provider
$provider->setWidgets($consumer);

//render widgets for place1
$consumer->renderWidgets('place1');
