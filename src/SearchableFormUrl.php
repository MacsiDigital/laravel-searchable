<?php

namespace MacsiDigital\Searchable;

class SearchableFormUrl
{
    /**
     * @return string
     */
    public static function render()
    {
        return self::formUrl();
    }

    private static function formUrl()
    {
        $href = '/'.request()->path().'?';
        foreach (request()->query() as $k => $v) {
            if ($k != 'search') {
                $href .= $k.'='.$v;
            }
        }
        return $href;
    }
}
