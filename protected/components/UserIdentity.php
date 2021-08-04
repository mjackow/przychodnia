<?php

/**
 * UserIdentity represents the data needed to identity a user.
 * It contains the authentication method that checks if the provided
 * data can identity the user.
 */
class UserIdentity extends CUserIdentity
{
    private $_id;
    /**
     * Authenticates a user.
     * The example implementation makes sure if the username and password
     * are both 'demo'.
     * In practical applications, this should be changed to authenticate
     * against some persistent user identity storage (e.g. database).
     * @return boolean whether authentication succeeds.
     */
    public function authenticate()
    {

        $username = $this->username;
        $password = md5($this->password);

        $user = Pracownik::model()->find(array('condition'=>"login = '$username'"));
        //$pass = Pracownik::model()->find(array('condition'=>"haslo = '$password'"));


        if(!empty($user))
        {
            /*$hashedPassword = md5($password);*/
            if($password == $user -> haslo)
            {
                /*die("Zalogowano teoretycznie a praktycznie nie :D");*/
                $this->errorCode=self::ERROR_NONE;
                $this->_id=$user->idPracownik;
            }
        }
        else {
            $this->errorCode=self::ERROR_PASSWORD_INVALID;
            $this->errorCode=self::ERROR_USERNAME_INVALID;
        }
        /*	else if {


            }*/
        return !$this->errorCode;
    }


    public function getId()
    {
        return $this->_id;
    }
}