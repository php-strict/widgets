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

class MyWidgetsConsumer implements \PhpStrict\WidgetsConsumer\WidgetsConsumerInterface
{
    protected $scope = '';
    
    protected $places = [];
    
    protected $widgets = [];
    
    public function __construct(string $scope = '', array $places = [])
    {
        $this->scope = $scope;
        $this->places = $places;
    }
    
    public function getCurrentScope(): string
    {
        return $this->scope;
    }
    
    public function getWidgetsPlaces(): array
    {
        return $this->places;
    }
    
    public function setWidgets(array $widgets): void
    {
        $this->widgets = $widgets;
    }
    
    public function appendWidgets(array $widgets): void
    {
        $this->widgets = array_merge_recursive($this->widgets, $widgets);
    }
    
    /**
     *  Simple widget render implementation.
     *  
     *  @param string $place
     *  
     *  @return void
     */
    public function renderWidgets(string $place): void
    {
        if (!array_key_exists($place, $this->widgets)) {
            print_r('place ' . $place . ' has no widgets' . "\n");
            return;
        }
        foreach ($this->widgets[$place] as $widget) {
            print_r(
                'place: ' . $place . 
                '; title: ' . $widget->getTitle() . 
                '; conntent: ' . $widget->getContent() . 
                "\n"
            );
        }
    }
    
}
