<?php
/**
 * PHP Strict.
 * 
 * @copyright   Copyright (C) 2018 - 2019 Enikeishik <enikeishik@gmail.com>. All rights reserved.
 * @author      Enikeishik <enikeishik@gmail.com>
 * @license     GNU General Public License version 2 or later; see LICENSE.txt
 */

declare(strict_types=1);

namespace PhpStrict\Widgets;

/**
 *  Simple implementation of widgets provider.
 *  Not used any widgets producers, just generates widgets with data.
 */
class MyWidgetsProvider2 extends MyWidgetsProvider1
{
    protected function produceWidget(array $widgetData): \PhpStrict\WidgetsProducer\WidgetInterface
    {
        $producer = new $widgetData['producer']();
        return $producer->createWidget($widgetData);
    }
}
