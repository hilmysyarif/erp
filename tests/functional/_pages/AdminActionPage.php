<?php

class AdminActionPage
{
    // include url of current page
    public static $URL = '/admins';

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

    public static function of(FunctionalTester $I)
    {
        return new static($I);
    }

    /**
     * @return AdminActionPage
     */
    
    public function imAdmin()
    {
        $I = $this->functionalTester;

        $I->amOnPage(self::$URL);
        
        return $this;
    }

    public function createAdmin($username,$name,$lastName,$password)
    {
        $I = $this->functionalTester;

        $I->amOnPage(CreateAdminPage::$URL);
        $I->fillField(CreateAdminPage::$usernameField, $username);        
        $I->fillField(CreateAdminPage::$nameField, $name);            
        $I->fillField(CreateAdminPage::$lastNameField, $lastName);        
        $I->fillField(CreateAdminPage::$passwordField, $password);        
        $I->fillField(CreateAdminPage::$confirmPasswordField, $password); 
        $I->click(CreateAdminPage::$loginButton);
        $I->amOnPage(self::$URL);
        

        return $this;
    }    
}