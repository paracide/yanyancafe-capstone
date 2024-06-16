<?php

namespace App\tools;

/**
 * Validator utils, put all error message in error array
 */
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

    /**
     * check empty field
     *
     * @param   mixed   $value      value
     * @param   string  $fieldName  field name
     *
     * @return void
     */
    public function checkEmpty(mixed $value, string $fieldName): void
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
        global $userRepo;
        if ($this->checkEmail($email)) {
            $user = $userRepo->getUserByEmail($email);
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

    /**
     * check image, image should be in the format
     *
     * @param   string  $fileName  the file name in $_FILES, in other words,
     *                             the file name form the form
     *
     * @return array image info
     */
    public function checkImg(string $fileName): array
    {
        $imageInfo = Verifier::isImage($fileName);
        if ( ! $imageInfo) {
            $this->error[$fileName][] = "Image is required";
        }

        return $imageInfo;
    }

    /**
     * check number, optional with min and max
     * @param   string      $v
     * @param   string      $field
     * @param   float|null  $min
     * @param   float|null  $max
     *
     * @return void
     */
    public function checkNum(
      string $v,
      string $field,
      ?float $min = null,
      ?float $max = null
    ): void {
        if ( ! is_numeric($v)) {
            $this->error[$field][] = "Should be a number";
        } elseif (isset($min) && $v < $min) {
            $this->error[$field][] = "Should bigger than $min";
        } elseif (isset($max) && $v > $max) {
            $this->error[$field][] = "Should less than $max";
        }
    }

}
