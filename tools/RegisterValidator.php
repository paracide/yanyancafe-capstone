<?php

class RegisterValidator
{

    private array $errors = [];

    public function getErrors(): array
    {
        return $this->errors;
    }

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
     * check all required fields
     */
    public function checkRequired(
      array $requiredArr,
      array $toValidateArr
    ): void {
        foreach ($requiredArr as $item) {
            if (empty($toValidateArr[$item])) {
                $this->errors[$item][] = StringUtils::label($item)
                                         . "  is a required field";
            }
        }
    }

    /**
     * check Password
     */
    public function checkPassword(
      string $password,
      string $confirmPassword
    ): void {
        //password should be same
        if ($password !== $confirmPassword) {
            $errorMsg                     = 'Password are not same.';
            $errors['password'] []        = $errorMsg;
            $errors['confirm_password'][] = $errorMsg;
        } elseif ( ! self::isPassword($password)) {
            $errors['password'] [] = 'Length should be between 8 to 20';
        }
    }

    /**
     * check Name
     */
    public function checkName(string $value,string $fieldName): void
    {
        if ( ! self::isName($value)) {
            $errors[$fieldName][]
              = "Should be letters and between 1 to 255 character";
        }
    }

    /**
     * check Email
     */
    public function checkEmail(string $email): void
    {
        if ( ! self::isEmail($email)) {
            $errors['email'][]
              = "Should be in the format: example@example.com.";
        } else {
            $user = getUserByEmail($email);
            if (count($user) > 0) {
                $errors['email'][] = "This email has registered.";
            }
        }
    }

    /**
     * check Phone
     */
    public function checkPhone(string $phone): void
    {
        if ( ! self:: isPhone($phone)) {
            $errors['phone'][] = "Should be in the format: XXX-XXX-XXXX.";
        }
    }

    /**
     * check Postal Code
     */
    public function checkPostalCode(string $postalCode): void
    {
        if ( ! self::isCaPostalCode($postalCode)) {
            $errors['postal_code'][] = "Should be in the format: A1A 1A1.";
        }
    }

}
