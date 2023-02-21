<?php

use Carbon\Carbon;

/** 
 * This function shows the date and time of the posts
 * as *time* ago format...
 */

function timeElapsedString($datetime, $full = false) {
    $now = Carbon::now();
    $ago = Carbon::parse($datetime);
    $diff = $now->diff($ago);

    $diff->w = floor($diff->d / 7);
    $diff->d -= $diff->w * 7;

    $string = [
        'y' => 'y',
        'm' => 'm',
        'w' => 'w',
        'd' => 'd',
        'h' => 'h',
        'i' => 'm',
        's' => 's',
    ];

    foreach ($string as $key => &$value) {
        if ($diff->$key) {
            $value = $diff->$key . $value;
        } else {
            unset($string[$key]);
        }
    }

    if (!$full) {
        $string = array_slice($string, 0, 1);
    }

    if (empty($string)) {
        return 'now';
    }

    $result = implode(' ', $string) . ' ago';
    if ($diff->y > 0 || $diff->m > 1 || ($diff->m == 1 && $diff->d > 14)) {
        $result = $ago->format('F j, Y');
    } 

    return $result;
}


