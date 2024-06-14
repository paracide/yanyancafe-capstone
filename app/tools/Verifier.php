<?php

namespace App\tools;

/**
 * Verifier utils
 */
class Verifier
{

    /**
     * check email format
     *
     * @param   string  $email
     *
     * @return bool is email return true
     */
    public static function isEmail(string $email): bool
    {
        return (bool)filter_var(
          $email,
          FILTER_VALIDATE_EMAIL
        );
    }

    /**
     * check phone format
     *
     * @param   string  $phone
     *
     * @return bool is phone return true
     */
    public static function isPhone(string $phone): bool
    {
        $phonePattern = '/^(\d{3})[-.\s]?(\d{3})[-.\s]?\d{4}$/';

        return (bool)preg_match($phonePattern, $phone);
    }

    /**
     * check postal code format
     *
     * @param   string  $code
     *
     * @return bool is postal code return true
     */
    public static function isCaPostalCode(string $code): bool
    {
        $codePattern = '/^[A-Za-z]\d[A-Za-z][-\s]?\d[A-Za-z]\d$/';

        return (bool)preg_match($codePattern, $code);
    }

    /**
     * check password format
     *
     * @param   string  $password
     *
     * @return bool is password return true
     */
    public static function isPassword(string $password): bool
    {
        $namePattern = '/^.{8,20}$/';

        return (bool)preg_match($namePattern, $password);
    }

    /**
     * check name format
     *
     * @param   string  $name
     *
     * @return bool is name return true
     */
    public static function isName(string $name): bool
    {
        $namePattern = '/^[A-Z][a-zA-Z]{1,255}$/';

        return (bool)preg_match($namePattern, $name);
    }

    public static function isImage(string $fileName): array
    {
        $picture = $_FILES[$fileName];
        $path    = $picture['tmp_name'];
        if (empty($path)) {
            return [];
        }

        return getimagesize($path) ?? [];
    }

}
