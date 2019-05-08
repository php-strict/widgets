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

class MyWidgetsProvider extends \PhpStrict\WidgetsProvider\WidgetsProvider
{
    public function __construct(\PhpStrict\WidgetsProvider\WidgetsDataStorageInterface $storage)
    {
        $this->storage = $storage;
    }
    
    public function flushWidgets(): void
    {
        $this->widgets = null;
    }
    
    protected function produceWidget(array $widgetData): \PhpStrict\WidgetsProducer\WidgetInterface
    {
        //windgets producer emulation
        return new MyProducedWidget($widgetData);
    }
}
