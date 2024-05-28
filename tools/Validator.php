<?php

class Validator
{

    private array $error = [];

    public function getError(): array
    {
        return $this->error;
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

    public function checkEmpty($value, string $fieldName)
    {
        if (empty($value)) {
            $this->error[$fieldName][] = StringUtils::label($fieldName)
                                         . "  is a required field. ";
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
        } elseif ( ! Verifier::isPassword($password)) {
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
        if ( ! Verifier::isName($name)) {
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
     * @throws \Exception
     */
    public function checkUniqueEmail(string $email): void
    {
        global $userRepository;
        if ( ! $this->checkEmail($email)) {
            $user = $userRepository->getUserByEmail($email);
            if (count($user) > 0) {
                $this->error['email'][] = "This email has registered.";
            }
        }
    }

    /**
     * check email format
     *
     * @param   string  $email  email
     *
     */
    public function checkEmail(string $email): bool
    {
        global $userRepository;
        $isEmail = Verifier::isEmail($email);
        if ( ! $isEmail) {
            $this->error['email'][]
              = "Should be in the format: example@example.com.";
        }

        return $isEmail;
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
        if ( ! Verifier:: isPhone($phone)) {
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
        if ( ! Verifier::isCaPostalCode($postalCode)) {
            $this->error['postal_code'][] = "Should be in the format: A1A 1A1.";
        }
    }

    public function checkUserByEmail(string $email,$password): void
    {


        if (empty($user) || password_verify($password, $user['password'])) {
            $this->error['email'][]
              = "Login credentials do not match our records";
        }
    }
}
