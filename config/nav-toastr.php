<?php


/*
 * This file is part of the Laravel Navigation Toastr package.
 *
 * (c) Mujtech Mujeeb <mujeeb.muhideen@gmail.com>
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */


return [

    // Limit the number of toast to display per time

    'maxItems' => null,

    /* 
        
        * Custom button settings
        *
        * $param array $custombuttons
        * $param string $text
        * $param string $url
        * $param bool $reload 

    */

    'custombuttons' => [
        [
            'text'      => 'Refresh the page',
            'reload'    => true
        ],
        [
            'text'      => 'My Website',
            'url'       => 'https://mujh.tech'
        ],
        [
            'text'      => 'Twitter',
            'url'       => 'https://twitter.com/mujhtech'
        ]
    ],
    
];