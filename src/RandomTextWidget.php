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

class RandomTextWidget implements \PhpStrict\WidgetsProducer\WidgetInterface
{
    protected $title = '';
    protected $text = '';
    
    public function __construct(string $title, string $text)
    {
        $this->title = $title;
        $this->text = $text;
    }
    
    public function getTitle(): string
    {
        return $this->title;
    }
    
    public function getContent(): string
    {
        return $this->text;
    }
}
