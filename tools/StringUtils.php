<?php

class StringUtils
{

    public static function label(string $field)
    {
        return ucwords(str_replace('_', ' ', $field));
    }

}
