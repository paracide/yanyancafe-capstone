<?php

class StringUtils
{

    /**
     * convert snake case to camel case
     *
     * @param   string  $field
     *
     * @return string
     */
    public static function label(string $field): string
    {
        return ucwords(str_replace('_', ' ', $field));
    }

}
