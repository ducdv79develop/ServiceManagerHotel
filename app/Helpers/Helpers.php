<?php

namespace App\Helpers;

class Helpers
{
    /**
     * @param $needle
     * @param $haystack
     * @return bool
     */
    public static function shapeSpace_search_array($needle, $haystack)
    {
        if (in_array($needle, $haystack)) {
            return true;
        }
        foreach ($haystack as $item) {
            if (is_array($item) && array_search($needle, $item))
                return true;
        }
        return false;
    }
}
