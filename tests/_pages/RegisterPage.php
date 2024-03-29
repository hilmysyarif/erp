<?php

class RegisterPage
{
    // include url of current page
    public static $URL = '/register';

    /**
     * Declare UI map for this page here. CSS or XPath allowed.
     * public static $usernameField = '#username';
     * public static $formSubmitButton = "#mainForm input[type=submit]";
     */
     public static $usernameField        = 'Email:';
     public static $passwordField        = 'Contraseña:';
     public static $confirmPasswordField = 'Confirmar Contraseña:';
     public static $loginButton          = 'input[type="submit"]';

    

    /**
     * Basic route example for your current URL
     * You can append any additional parameter to URL
     * and use it in tests like: EditPage::route('/123-post');
     */
     public static function route($param)
     {
        return static::$URL.$param;
     }


}