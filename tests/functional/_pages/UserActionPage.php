<?php

class UserActionPage
{
    // include url of current page
    public static $URL = '/login';

    /**
     * Declare UI map for this page here. CSS or XPath allowed.
     * public static $usernameField = '#username';
     * public static $formSubmitButton = "#mainForm input[type=submit]";
     */

    /**
     * Basic route example for your current URL
     * You can append any additional parameter to URL
     * and use it in tests like: EditPage::route('/123-post');
     */
     public static function route($param)
     {
        return static::$URL.$param;
     }

    /**
     * @var FunctionalTester;
     */
    protected $functionalTester;

    public function __construct(FunctionalTester $I)
    {
        $this->functionalTester = $I;
    }

    /**
     * @return UserActionPage
     */
    public static function of(FunctionalTester $I)
    {
        return new static($I);
    }

     /**
     * Login any user into the app
     * @param  string $name     Username
     * @param  string $password Password
     * @return OK
     */
    public function login($name, $password)
    {
        $I = $this->functionalTester;

        $I->amOnPage(self::$URL);
        $I->fillField(LoginPage::$usernameField, $name);
        $I->fillField(LoginPage::$passwordField, $password);
        $I->click(LoginPage::$loginButton);

        return $this;
    }    
     
    

     /**
      * [logout description]
      * @return [type] [description]
      */
     public function logout()
    {
        $I = $this->functionalTester;

        $I->see('Salir');
        $I->click('Salir');

        return $this;
    }    


}