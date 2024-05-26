<?php

class RegisterValidator
{

    private array $error = [];

    public function getError(): array
    {
        return $this->error;
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
     * check required fields
     *
     * @param   array  $requiredArr    required fields
     * @param   array  $toValidateArr  fields to validate
     *
     * @return void
     */
    public function checkRequired(
      array $requiredArr,
      array $toValidateArr
    ): void {
        foreach ($requiredArr as $item) {
            if (empty($toValidateArr[$item])) {
                $this->error[$item][] = StringUtils::label($item)
                                        . "  is a required field. ";
            }
        }
    }

    /**
     * check password, password should be same and length should be between 8
     * and 20
     *
     * @param   string  $password         password
     * @param   string  $confirmPassword  confirm password
     *
     * @return void
     */
    public function checkPassword(
      string $password,
      string $confirmPassword
    ): void {
        //password should be same
        if ($password !== $confirmPassword) {
            $errorMsg                          = 'Password are not same. ';
            $this->error['password'] []        = $errorMsg;
            $this->error['confirm_password'][] = $errorMsg;
        } elseif ( ! self::isPassword($password)) {
            $this->error['password'] [] = 'Length should be between 8 and 20. ';
        }
    }

    /**
     * check name
     *
     * @param   string  $name       name
     * @param   string  $fieldName  firstName or lastName
     *
     * @return void
     */
    public function checkName(string $name, string $fieldName): void
    {
        if ( ! self::isName($name)) {
            $this->error[$fieldName][]
              = "Should be letters and between 1 to 255 character. ";
        }
    }

    /**
     * check email, email should in the format and not registered
     *
     * @param   string  $email  email
     *
     * @return void
     */
    public function checkEmail(string $email): void
    {
        global $userRepository;
        if ( ! self::isEmail($email)) {
            $this->error['email'][]
              = "Should be in the format: example@example.com.";
        } else {
            $user = $userRepository->getUserByEmail($email);
            if (count($user) > 0) {
                $this->error['email'][] = "This email has registered.";
            }
        }
    }

    /**
     * check phone, phone should be in the format XXX-XXX-XXXX
     *
     * @param   string  $phone  phone
     *
     * @return void
     */
    public function checkPhone(string $phone): void
    {
        if ( ! self:: isPhone($phone)) {
            $this->error['phone'][] = "Should be in the format: XXX-XXX-XXXX.";
        }
    }

    /**
     * check postal code, postal code should be in the Canadian format A1A 1A1
     *
     * @param   string  $postalCode  postal code
     *
     * @return void
     */
    public function checkPostalCode(string $postalCode): void
    {
        if ( ! self::isCaPostalCode($postalCode)) {
            $this->error['postal_code'][] = "Should be in the format: A1A 1A1.";
        }
    }

}
