<?php

require_once '/PHPUnit/Autoload.php';

class test_invite_to_project_and_accept_with_the_member_invited extends PHPUnit_Extensions_SeleniumTestCase
{
	/* La configuration pour executer le test doit etre la suivante :
	- mail_de_test1@mail.com : utilisateur sans projet
	- mail_de_test2@mail.com : doit etre associé à un projet nommé "projet_de_test" sans autres membres a part lui meme
	*/
	
	var $url    	 = "/cdp/mursc";
	var $user1 		 = "compte_de_test1";
	var $mailtest1   = "mail_de_test1@mail.com";
	var $mailtest2   = "mail_de_test2@mail.com";
	var $password1   = "password_de_test";
	var $password2   = "password_de_test";
	var $projet_test = "projet_de_test";
	
	
	// Configuration navigateur
  protected function setUp()
  {
    $this->setBrowser("*firefox");
    $this->setBrowserUrl("http://127.0.0.1/");
  }
  
  public function testMyTestCase()
  {
    $this->open($this->url);
    $this->type("name=email", $this->mailtest2);
    $this->type("name=password", $this->password2);
    $this->click("name=login_submit");
    $this->waitForPageToLoad("30000");
	sleep(1);
	$this->click("xpath=(//a[contains(text(),'Edit')])[1]");
	$this->waitForPageToLoad("30000");
	sleep(1);
    $this->click("link=Invite new members");
	$this->waitForPageToLoad("30000");
	sleep(1);
    $this->type("name=username", $this->user1);
    $this->click("name=invite");
    $this->click("link=Return to the projects parameters");
	$this->waitForPageToLoad("30000");
	sleep(1);
    $this->select("name=status_invited_2", "label=watcher");
    $this->click("name=create");
    $this->click("css=button.btn.btn-default");
	$this->waitForPageToLoad("30000");
	sleep(1);
    $this->type("name=email", $this->mailtest1);
    $this->type("name=password", $this->password1);
    $this->click("name=login_submit");
	$this->waitForPageToLoad("30000");
	sleep(1);
    $this->click("link=Accept");
	$this->waitForPageToLoad("30000");
	sleep(1);
    $this->click("link=Quit");
	$this->assertTrue((bool)preg_match('/^Are you sure you want to quit the project projet_de_test ?[\s\S]$/',$this->getConfirmation()));
  }
}
?>