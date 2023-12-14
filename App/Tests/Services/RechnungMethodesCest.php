<?php
class RechnungMethodesCest
{
    public $tag = 'Rechnung';
    public $filename = 'THPG_B2C_Zero_order_Rechnung';
    public function _before(AcceptanceTester $I)
    {
    }
    public function Logout(AcceptanceTester $I)
    {
        $I->click('/html/body/div[3]/header/div[1]/div/ul/li[2]/span/button');
        $I->click('Abmelden');
        $I->wait('3');
    }
    public function B2bbadrating_Login(AcceptanceTester $I)
    {
        $I->amOnPage('/');
        $I->click('Anmelden');
        $I->wait('2');
        $I->click('//*[@id="btn-cookie-allow"]');
        $I->fillField('#email','b2bbadrating@example.com');
        $I->fillField('#pass','Muckidee8687!');
        $I->makeScreenshot($this->tag.'/1');
        $I->wait('2');
        $I->click('#send2');
        $this->user = 'b2bbadrating@example.com';
        $I->wait('3');
        $I->amOnPage("rma/");
        $I->wait('3');
    }
    public function B2bkeyaccount_Login(AcceptanceTester $I)
    {
        $I->amOnPage('/');
        $I->click('Anmelden');
        $I->wait('2');
        $I->click('//*[@id="btn-cookie-allow"]');
        $I->fillField('#email','b2bkeyaccount@example.com');
        $I->fillField('#pass','Muckidee8687!');
        $I->makeScreenshot($this->tag.'/1');
        $I->wait('2');
        $I->click('#send2');
        $this->user = 'b2bkeyaccount@example.com';
        $I->wait('3');
        $I->amOnPage("rma/");
        $I->wait('3');
    }
    public function B2bzeroorders_Login(AcceptanceTester $I)
    {
        $I->amOnPage('/');
        $I->click('Anmelden');
        $I->wait('2');
        $I->click('//*[@id="btn-cookie-allow"]');
        $I->fillField('#email','b2bzeroorders@example.com');
        $I->fillField('#pass','Muckidee8687!');
        $I->makeScreenshot($this->tag.'/1');
        $I->wait('2');
        $I->click('#send2');
        $this->user = 'b2bzeroorders@example.com';
        $I->wait('3');
        $I->amOnPage("rma/");
        $I->wait('3');
    }
    public function B2boneoreder_Login(AcceptanceTester $I)
    {
        $I->amOnPage('/');
        $I->click('Anmelden');
        $I->wait('2');
        $I->click('//*[@id="btn-cookie-allow"]');
        $I->fillField('#email','b2boneoreder@example.com');
        $I->fillField('#pass','Muckidee8687!');
        $I->makeScreenshot($this->tag.'/1');
        $I->wait('2');
        $I->click('#send2');
        $this->user = 'b2boneoreder@example.com';
        $I->wait('3');
        $I->amOnPage("rma/");
        $I->wait('3');
    }
    public function B2coneoreder_Login(AcceptanceTester $I)
    {
        $I->amOnPage('/');
        $I->click('Anmelden');
        $I->wait('2');
        $I->click('//*[@id="btn-cookie-allow"]');
        $I->fillField('#email','b2coneoreder@example.com');
        $I->fillField('#pass','Muckidee8687!');
        $I->makeScreenshot($this->tag.'/1');
        $I->wait('2');
        $I->click('#send2');
        $this->user = 'b2boneoreder@example.com';
        $I->wait('3');
        $I->amOnPage("rma/");
        $I->wait('3');
    }
    public function B2bbadrating_Test(AcceptanceTester $I)
    {
        $I->amOnPage("leuchten/werkstattleuchten");
        $I->wait('2');
        $I->makeScreenshot('2');
        $I->click('//*[@id="maincontent"]/div[3]/div[1]/div[3]/ol/li[1]/div/div[3]/div/div/form/button');
        $I->wait('2');
        $I->amOnPage('/checkout/cart/');
        $I->makeScreenshot('3');
        $I->wait('3');
        $I->amOnPage('/checkout/');
        $I->wait('10');
        $I->scrollTo('#shipping-method-buttons-container > div > button');
        $I->wait('3');
        $I->click('//*[@id="checkout-shipping-method-load"]/table/tbody/tr[1]/td[1]');
        $I->wait('2');
        $I->click('#shipping-method-buttons-container > div > button');
        $I->wait('10');
        $I->makeScreenshot('4');
        $I->amOnPage("rma/");
        $I->wait('3');


    }
    public function B2bzeroorder_Test(AcceptanceTester $I)
    {
        $I->amOnPage("leuchten/werkstattleuchten");
        $I->wait('2');
        $I->makeScreenshot('2');
        $I->click('//*[@id="maincontent"]/div[3]/div[1]/div[3]/ol/li[1]/div/div[3]/div/div/form/button');
        $I->wait('2');
        $I->amOnPage('/checkout/cart/');
        $I->makeScreenshot('3');
        $I->wait('3');
        $I->amOnPage('/checkout/');
        $I->wait('10');
        $I->scrollTo('#shipping-method-buttons-container > div > button');
        $I->wait('3');
        $I->click('//*[@id="checkout-shipping-method-load"]/table/tbody/tr[1]/td[1]');
        $I->wait('2');
        $I->click('#shipping-method-buttons-container > div > button');
        $I->wait('10');
        $I->makeScreenshot('4');
        $I->amOnPage("rma/");
        $I->wait('3');


    }
    public function B2boneorder_Test3(AcceptanceTester $I)
    {
        $I->fillField('//*[@id="search"]', ' 145771');
        $I->wait('3');
        $I->click(' //*[@id="search_mini_form"]/div[2]/button');
        $I->wait('2');
        $I->click('//*[@id="product-addtocart-button"]/span');
        $I->wait('2');
        $I->wait('2');
        $I->amOnPage('/checkout/cart/');
        $I->makeScreenshot($this->tag.'/6');
        $I->wait('3');
        $I->amOnPage('/checkout/');
        $I->wait('10');
        $I->scrollTo('#shipping-method-buttons-container > div > button');
        $I->wait('3');
        $I->click('//*[@id="checkout-shipping-method-load"]/table/tbody/tr[1]/td[1]');
        $I->wait('2');
        $I->click('#shipping-method-buttons-container > div > button');
        $I->wait('10');
        $I->makeScreenshot($this->tag.'/7');
        $I->amOnPage("rma/");
        $I->wait('3');
        $pdf = new \acceptance\GeneratePdf();
        $pdf->Generate($this->tag,$this->filename);




    }
    public function B2bkeyaccount_Test3(AcceptanceTester $I)
    {
        $I->amOnPage("leuchten/werkstattleuchten");
        //$I->scrollTo('//*[@id="maincontent"]/div[2]/div[1]/div[3]/ol/li[3]/div');
        $I->wait('2');
        $I->makeScreenshot('5');
        $I->click('//*[@id="maincontent"]/div[3]/div[1]/div[3]/ol/li[1]/div/div[3]/div/div/form/button');
        $I->wait('2');
        $I->amOnPage('/checkout/cart/');

        $I->fillField('//*[@id="shopping-cart-table"]/tbody/tr[1]/td[3]/div/div/label/input',100);
        $I->wait('3');
        //$I->scrollTo('div.cart.main.actions > button');
        $I->click('div.cart.main.actions > button');
        //$I->wait('5');
        //$I->see("We don't have as many quantity");
        $I->wait('3');
        $I->makeScreenshot('6');
        $I->wait('3');
        $I->amOnPage('/checkout/');
        $I->wait('10');
        $I->scrollTo('#shipping-method-buttons-container > div > button');
        $I->wait('3');
        $I->click('//*[@id="checkout-shipping-method-load"]/table/tbody/tr[1]/td[1]');
        $I->wait('2');
        $I->click('#shipping-method-buttons-container > div > button');
        $I->wait('10');
        $I->makeScreenshot('7');
        $I->amOnPage("rma/");
        $I->wait('3');


    }
    public function B2bkeyaccount_Test4(AcceptanceTester $I)
    {
        $I->amOnPage("/mobel-und-einrichtung/");
        $I->wait('2');
        $I->makeScreenshot('8');
        $I->click('//*[@id="maincontent"]/div[3]/div[1]/div[3]/ol/li[1]/div/div[3]/div/div/form/button');
        $I->wait('2');
        $I->amOnPage('/checkout/cart/');
        $I->makeScreenshot('9');
        $I->wait('3');
        $I->amOnPage('/checkout/');
        $I->wait('10');
        $I->scrollTo('#shipping-method-buttons-container > div > button');
        $I->wait('3');
        $I->click('//*[@id="checkout-shipping-method-load"]/table/tbody/tr[1]/td[1]');
        $I->wait('2');
        $I->click('#shipping-method-buttons-container > div > button');
        $I->wait('10');
        $I->makeScreenshot('10');
        $I->amOnPage("rma/");
        $I->wait('3');


    }
    public function B2boneorder_Test1(AcceptanceTester $I)
    {
        $I->fillField('//*[@id="search"]', ' 182553');
        $I->wait('3');
        $I->click(' //*[@id="search_mini_form"]/div[2]/button');
        $I->wait('2');
        $I->click('//*[@id="product-addtocart-button"]/span');

        $I->wait('2');
        $I->amOnPage('/checkout/cart/');
        $I->makeScreenshot($this->tag.'/2');
        $I->wait('3');
        $I->amOnPage('/checkout/');
        $I->wait('10');
        $I->scrollTo('#shipping-method-buttons-container > div > button');
        $I->wait('3');
        $I->click('//*[@id="checkout-shipping-method-load"]/table/tbody/tr[1]/td[1]');
        $I->wait('2');
        $I->click('#shipping-method-buttons-container > div > button');
        $I->wait('10');
        $I->makeScreenshot($this->tag.'/3');
        $I->amOnPage("rma/");
        $I->wait('3');
        $pdf = new \acceptance\GeneratePdf();
        $pdf->Generate($this->tag,$this->filename);


    }

  /*  public function B2bkeyaccount_Test2(AcceptanceTester $I)
    {

        $I->fillField('//*[@id="search"]', ' 182553');
        $I->wait('3');
        $I->click(' //*[@id="search_mini_form"]/div[2]/button');
        $I->wait('2');
        $I->click('//*[@id="product-addtocart-button"]/span');
        $I->wait('2');
        $I->amOnPage('/checkout/cart/');
        $I->fillField('/html/body/div[3]/main/div[2]/div/div[2]/form/div[1]/table/tbody[1]/tr[1]/td[3]/div/div/label/input',100);
        $I->scrollTo('div.cart.main.actions > button');
        $I->click('div.cart.main.actions > button');
        $I->makeScreenshot($this->tag.'/4');
        $I->wait('3');
        $I->amOnPage('/checkout/');
        $I->wait('10');
        $I->scrollTo('#shipping-method-buttons-container > div > button');
        $I->wait('3');
        $I->click('//*[@id="checkout-shipping-method-load"]/table/tbody/tr[1]/td[1]');
        $I->wait('2');
        $I->click('#shipping-method-buttons-container > div > button');
        $I->wait('10');
        $I->makeScreenshot($this->tag.'/5');
        $I->amOnPage("rma/");
        $I->wait('3');





    }*/
    public function B2boneorder_Test2(AcceptanceTester $I)
    {

        $I->fillField('//*[@id="search"]', ' 182553');
        $I->wait('3');
        $I->click(' //*[@id="search_mini_form"]/div[2]/button');
        $I->wait('2');
        $I->click('//*[@id="product-addtocart-button"]/span');
        $I->wait('2');
        $I->wait('2');
        $I->amOnPage('/checkout/cart/');

        $I->fillField('/html/body/div[3]/main/div[2]/div/div[2]/form/div[1]/table/tbody[1]/tr[1]/td[3]/div/div/label/input',100);
        $I->scrollTo('div.cart.main.actions > button');
        $I->click('div.cart.main.actions > button');
        $I->makeScreenshot($this->tag.'/4');
        $I->wait('3');
        //$I->scrollTo('div.cart.main.actions > button');
        $I->click('div.cart.main.actions > button');
        //$I->wait('5');
        //$I->see("We don't have as many quantity");
        $I->wait('3');

        $I->wait('3');
        $I->amOnPage('/checkout/');
        $I->wait('10');
        $I->scrollTo('#shipping-method-buttons-container > div > button');
        $I->wait('3');
        $I->click('//*[@id="checkout-shipping-method-load"]/table/tbody/tr[1]/td[1]');
        $I->wait('2');
        $I->click('#shipping-method-buttons-container > div > button');
        $I->wait('10');
        $I->makeScreenshot($this->tag.'/5');
        $I->amOnPage("rma/");
        $I->wait('3');
    }
    /*********************************************************************************************************/
    public function B2coneorder_Test(AcceptanceTester $I)
    {
        $I->amOnPage("leuchten/werkstattleuchten");
        $I->wait('2');
        $I->makeScreenshot('2');
        $I->click('//*[@id="maincontent"]/div[3]/div[1]/div[3]/ol/li[1]/div/div[3]/div/div/form/button');
        $I->wait('2');
        $I->amOnPage('/checkout/cart/');
        $I->makeScreenshot('3');
        $I->wait('3');
        $I->amOnPage('/checkout/');
        $I->wait('10');
        $I->scrollTo('#shipping-method-buttons-container > div > button');
        $I->wait('3');
        $I->click('//*[@id="checkout-shipping-method-load"]/table/tbody/tr[1]/td[1]');
        $I->wait('2');
        $I->click('#shipping-method-buttons-container > div > button');
        $I->wait('10');
        $I->see('Rechnung');
        $I->makeScreenshot('4');
        $I->amOnPage("rma/");
        $I->wait('3');


    }
    public function B2coneorder_Test1(AcceptanceTester $I)
    {
        $I->amOnPage("leuchten/werkstattleuchten");
        //$I->scrollTo('//*[@id="maincontent"]/div[2]/div[1]/div[3]/ol/li[3]/div');
        $I->wait('2');
        $I->makeScreenshot('5');
        $I->click('//*[@id="maincontent"]/div[3]/div[1]/div[3]/ol/li[1]/div/div[3]/div/div/form/button');
        $I->wait('2');
        $I->amOnPage('/checkout/cart/');

        $I->fillField('//*[@id="shopping-cart-table"]/tbody/tr[1]/td[3]/div/div/label/input',100);
        $I->wait('3');
        //$I->scrollTo('div.cart.main.actions > button');
        $I->click('div.cart.main.actions > button');
        //$I->wait('5');
        //$I->see("We don't have as many quantity");
        $I->wait('3');
        $I->makeScreenshot('6');
        $I->wait('3');
        $I->amOnPage('/checkout/');
        $I->wait('10');
        $I->scrollTo('#shipping-method-buttons-container > div > button');
        $I->wait('3');
        $I->click('//*[@id="checkout-shipping-method-load"]/table/tbody/tr[1]/td[1]');
        $I->wait('2');
        $I->click('#shipping-method-buttons-container > div > button');
        $I->wait('10');
        $I->makeScreenshot('7');
        $I->amOnPage("rma/");
        $I->wait('3');


    }


    public function B2coneorder_Test2(AcceptanceTester $I)
    {
        $I->amOnPage("/mobel-und-einrichtung/");
        $I->wait('2');
        $I->makeScreenshot('8');
        $I->click('//*[@id="maincontent"]/div[3]/div[1]/div[3]/ol/li[1]/div/div[3]/div/div/form/button');
        $I->wait('2');
        $I->amOnPage('/checkout/cart/');
        $I->makeScreenshot('9');
        $I->wait('3');
        $I->amOnPage('/checkout/');
        $I->wait('10');
        $I->scrollTo('#shipping-method-buttons-container > div > button');
        $I->wait('3');
        $I->click('//*[@id="checkout-shipping-method-load"]/table/tbody/tr[1]/td[1]');
        $I->wait('2');
        $I->click('#shipping-method-buttons-container > div > button');
        $I->wait('10');
        $I->makeScreenshot('10');
        $I->amOnPage("rma/");
        $I->wait('3');


    }
    public function B2cbadrating_Login(AcceptanceTester $I)
    {
        $I->amOnPage('/');
        $I->click('Anmelden');
        $I->wait('2');
        $I->click('//*[@id="btn-cookie-allow"]');
        $I->fillField('#email','b2cbadrating@example.com');
        $I->fillField('#pass','Muckidee8687!');
        $I->makeScreenshot($this->tag.'/1');
        $I->wait('2');
        $I->click('#send2');
        $this->user = 'b2cbadrating@example.com';
        $I->wait('3');
        $I->amOnPage("rma/");
        $I->wait('3');
    }
    public function B2ceurope_Login(AcceptanceTester $I)
    {
        $I->amOnPage('/');
        $I->click('Anmelden');
        $I->wait('2');
        $I->click('//*[@id="btn-cookie-allow"]');
        $I->fillField('#email','b2ceu@example.com');
        $I->fillField('#pass','Muckidee8687!');
        $I->makeScreenshot($this->tag.'/1');
        $I->wait('2');
        $I->click('#send2');
        $this->user = 'b2cbadrating@example.com';
        $I->wait('3');
        $I->amOnPage("rma/");
        $I->wait('3');
    }

    public function B2ceurope_Test(AcceptanceTester $I)
    {
        $I->amOnPage("leuchten/werkstattleuchten");
        $I->wait('2');
        $I->makeScreenshot('2');
        $I->click('//*[@id="maincontent"]/div[3]/div[1]/div[3]/ol/li[1]/div/div[3]/div/div/form/button');
        $I->wait('2');
        $I->amOnPage('/checkout/cart/');
        $I->makeScreenshot('3');
        $I->wait('3');
        $I->amOnPage('/checkout/');
        $I->wait('10');
        $I->scrollTo('#shipping-method-buttons-container > div > button');
        $I->wait('3');
        $I->click('//*[@id="checkout-shipping-method-load"]/table/tbody/tr[1]/td[1]');
        $I->wait('2');
        $I->click('#shipping-method-buttons-container > div > button');
        $I->wait('10');
        $I->makeScreenshot('4');
        $I->amOnPage("rma/");
        $I->wait('3');
    }
    public function B2cbadrating_Test(AcceptanceTester $I)
    {
        $I->amOnPage("leuchten/werkstattleuchten");
        $I->wait('2');
        $I->makeScreenshot('2');
        $I->click('//*[@id="maincontent"]/div[3]/div[1]/div[3]/ol/li[1]/div/div[3]/div/div/form/button');
        $I->wait('2');
        $I->amOnPage('/checkout/cart/');
        $I->makeScreenshot('3');
        $I->wait('3');
        $I->amOnPage('/checkout/');
        $I->wait('10');
        $I->scrollTo('#shipping-method-buttons-container > div > button');
        $I->wait('3');
        $I->click('//*[@id="checkout-shipping-method-load"]/table/tbody/tr[1]/td[1]');
        $I->wait('2');
        $I->click('#shipping-method-buttons-container > div > button');
        $I->wait('10');
        $I->makeScreenshot('4');
        $I->amOnPage("rma/");
        $I->wait('3');



    }
    public function B2czeroorders_Login(AcceptanceTester $I)
    {
        $I->amOnPage('/');
        $I->click('Anmelden');
        $I->wait('2');
        $I->click('//*[@id="btn-cookie-allow"]');
        $I->fillField('#email','b2czeroorders@example.com');
        $I->fillField('#pass','Muckidee8687!');
        $I->makeScreenshot($this->tag.'/1');
        $I->wait('2');
        $I->click('#send2');
        $this->user = 'b2czeroorders@example.com';
        $I->wait('3');
        $I->amOnPage("rma/");
        $I->wait('3');
    }
    public function B2czeroorder_Test(AcceptanceTester $I)
    {
        $I->amOnPage("leuchten/werkstattleuchten");
        $I->wait('2');
        $I->makeScreenshot('2');
        $I->click('//*[@id="maincontent"]/div[3]/div[1]/div[3]/ol/li[1]/div/div[3]/div/div/form/button');
        $I->wait('2');
        $I->amOnPage('/checkout/cart/');
        $I->makeScreenshot('3');
        $I->wait('3');
        $I->amOnPage('/checkout/');
        $I->wait('10');
        $I->scrollTo('#shipping-method-buttons-container > div > button');
        $I->wait('3');
        $I->click('//*[@id="checkout-shipping-method-load"]/table/tbody/tr[1]/td[1]');
        $I->wait('2');
        $I->click('#shipping-method-buttons-container > div > button');
        $I->wait('10');
        $I->makeScreenshot('4');
        $I->amOnPage("rma/");
        $I->wait('3');


    }
    public function B2coneoredereur_Login(AcceptanceTester $I)
    {
        $I->amOnPage('/');
        $I->click('Anmelden');
        $I->wait('2');
        $I->click('//*[@id="btn-cookie-allow"]');
        $I->fillField('#email','b2coneoredereur@example.com');
        $I->fillField('#pass','Muckidee8687!');
        $I->makeScreenshot('15');
        $I->wait('2');
        $I->click('#send2');
        $this->user = 'b2boneoredereur@example.com';
        $I->wait('3');
        $I->amOnPage("rma/");
        $I->wait('3');
    }
    public function B2bkeyaccounteur_Login(AcceptanceTester $I)
    {
        $I->amOnPage('/');
        $I->click('Anmelden');
        $I->wait('2');
        $I->click('//*[@id="btn-cookie-allow"]');
        $I->fillField('#email','b2bkeyaccounteur@example.com');
        $I->fillField('#pass','Muckidee8687!');
        $I->makeScreenshot($this->tag.'/1');
        $I->wait('2');
        $I->click('#send2');
        $this->user = 'b2bkeyaccounteur@example.com';
        $I->wait('3');
        $I->amOnPage("rma/");
        $I->wait('3');
    }
    public function B2coneoredereur_Test(AcceptanceTester $I)
    {
        $I->amOnPage("leuchten/");
        $I->scrollTo('//*[@id="maincontent"]/div[2]/div[1]/div[3]/ol/li[3]/div');
        $I->wait('2');
        // $I->moveMouseOver('//*[@id="maincontent"]/div[3]/div[1]/div[3]/ol/li[1]/div');
        $I->click('//*[@id="maincontent"]/div[2]/div[1]/div[3]/ol/li[3]/div/div[3]/div/div/form/button');
        $I->wait('2');
        $I->click('body > div.page-wrapper > header > div.header.content > div.minicart-wrapper > a');
        $I->wait('2');
        $I->makeScreenshot('24');
        $I->click('//*[@id="top-cart-btn-checkout"]');
        $I->wait('7');
        $I->scrollTo('//*[@id="opc-shipping_method"]/div/div[1]');
        $I->click(' //*[@id="shipping-method-buttons-container"]/div/button');
        $I->wait('10');
        $I->makeScreenshot('25');
        $I->dontSee('Rechnung');
        $I->wait('5');



    }






    }
