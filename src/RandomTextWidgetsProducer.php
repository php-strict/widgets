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

class RandomTextWidgetsProducer implements \PhpStrict\WidgetsProducer\WidgetsProducerInterface
{
    /**
     *  @var array
     */
    protected $texts = [
        'First text',
        'Second text',
        'Third text',
    ];
    
    /**
     * Creates widget by widgets data.
     * 
     * @param array $data
     * 
     * @return WidgetInterface
     */
    public function createWidget(array $data): \PhpStrict\WidgetsProducer\WidgetInterface
    {
        return new RandomTextWidget(
            $data['title'],
            $this->texts[mt_rand(0, count($this->texts) - 1)]
        );
    }
}
