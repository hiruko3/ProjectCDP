<?php

require_once '/PHPUnit/Autoload.php';

class test_candidate_to_project_and_accept_by_a_project_member extends PHPUnit_Extensions_SeleniumTestCase
{
	/* La configuration pour executer le test doit etre la suivante :
	- mail_de_test1@mail.com : utilisateur sans projet
	- mail_de_test2@mail.com : doit etre associé à un projet nommé "projet_de_test" sans autres membres a part lui meme
	*/
	
	var $url    	 = "/cdp/mursc";
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
    $this->type("name=email", $this->mailtest1 );
    $this->type("name=password", $this->password1);
    $this->click("name=login_submit");
    $this->waitForPageToLoad("30000");
	sleep(1);
    $this->type("name=project_name",$this->projet_test);
    $this->click("link=Send a candidacy");
    $this->waitForPageToLoad("30000");
	sleep(1);
    $this->click("css=button.btn.btn-default");
    $this->waitForPageToLoad("30000");
	sleep(1);
    $this->type("name=email", $this->mailtest2);
    $this->type("name=password", $this->password2);
    $this->click("name=login_submit");
    $this->waitForPageToLoad("30000");
	sleep(1);
    $this->click("xpath=(//a[contains(text(),'Edit')])[1]");
    $this->waitForPageToLoad("30000");
	sleep(1);
    $this->click("name=candidature_2");
    $this->click("name=create");
    $this->waitForPageToLoad("30000");
	sleep(1);
    $this->click("css=button.btn.btn-default");
    $this->waitForPageToLoad("30000");
	sleep(1);
    $this->type("name=email", $this->mailtest1);
    $this->type("name=password", $this->password1);
    $this->click("name=login_submit");
    $this->waitForPageToLoad("30000");
	sleep(1);
    $this->click("xpath=(//a[contains(text(),'Quit')])[1]");
    $this->waitForPageToLoad("30000");
  }
}
?>