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
 *  Simple implementation of produced widget.
 *  Just takes and return widgets data.
 */
class MyProducedWidget implements \PhpStrict\WidgetsProducer\WidgetInterface
{
    protected $widgetData = [];
    
    public function __construct(array $widgetData)
    {
        $this->widgetData = $widgetData;
    }
    
    public function getTitle(): string
    {
        return 'title' . (isset($this->widgetData['mark']) ? '[' . $this->widgetData['mark'] . ']' : '');
    }
    
    public function getContent(): string
    {
        return 'content';
    }
}
