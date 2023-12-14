<?php

class DeliveryCostsEuropeCest
{
    public $tag = 'deliveryEurope';
    public $filename='Delivery_Costs_Europe';
    public function _before(AcceptanceTester $I)
    {
    }

    // tests
    public function tryToTest(AcceptanceTester $I)
    {
        $p = '15,00 €';
        /**** Bücher product***/
        $I->amOnPage('/customer/account/login/');
        $I->wait(5);
//        $I->click('//*[@id="btn-cookie-consent-essential"]');
        $I->wait(3);
        $I->fillField('login[username]', 'customerFR@example.fr');
        $I->fillField('login[password]', 'Muckidee8687!');
        $I->makeScreenshot($this->tag.'/1');
        $I->wait(10);
        $I->click('send');
        $I->wait(10);
        $I->amOnPage('esc/cart/clearcart');
        $I->wait(3);
        $I->amOnPage('buecher-product.html');
        $I->wait(2);
        $I->click('In den Warenkorb');
        $I->amOnPage('/checkout/cart');
        $I->wait(8);
        $I->see($p);
        $I->makeScreenshot($this->tag.'/1');
        $I->wait(2);
        /**** bücherl product + sonstige***/
        $I->amOnPage('sonstige-product.html');
        $I->wait(2);
        $I->click('In den Warenkorb');
        $I->amOnPage('/checkout/cart');
        $I->wait(20);
        $I->see($p);
        $I->makeScreenshot($this->tag.'/2');
        $I->amOnPage('esc/cart/clearcart');
        $I->wait(3);
        /**** bücher product + sp1***/
//        $I->amOnPage('buecher-product.html');
//        $I->wait(2);
//        $I->click('In den Warenkorb');
//        $I->wait(2);
//        $I->amOnPage('sperrgut1.html');
//        $I->wait(2);
//        $I->click('In den Warenkorb');
//        $I->wait(2);
//        $I->amOnPage('/checkout/cart');
//        $I->wait(8);
//        $I->see($p);
//        $I->makeScreenshot($this->tag.'/3');
        /**** bücher product + sp1 + sonstige***/
//        $I->amOnPage('sonstige-product.html');
//        $I->wait(2);
//        $I->click('In den Warenkorb');
//        $I->amOnPage('/checkout/cart');
//        $I->wait(8);
//        $I->see($p);
//        $I->makeScreenshot($this->tag.'/4');
//        $I->amOnPage('esc/cart/clearcart');
//        $I->wait(3);
        //$p = '2,80 €';
        /****sonstige***/
        $I->amOnPage('sonstige-product.html');
        $I->wait(2);
        $I->click('In den Warenkorb');
        $I->amOnPage('/checkout/cart');
        $I->wait(8);
        $I->see($p);
        $I->makeScreenshot($this->tag.'/5');
        $I->wait(3);
        /****sonstige + sp1***/
//        $I->amOnPage('sperrgut1.html');
//        $I->wait(2);
//        $I->click('In den Warenkorb');
//        $I->amOnPage('/checkout/cart');
//        $I->wait(8);
//        $I->see($p);
//        $I->makeScreenshot($this->tag.'/6');
//        $I->amOnPage('esc/cart/clearcart');
//        $I->wait(3);
       // $p = '0,00 €';
        /****sonstige > 60***/
//        $I->amOnPage('sonstige-product.html');
//        $I->wait(2);
//        $I->fillField('#qty',10);
//        $I->click('In den Warenkorb');
//        $I->amOnPage('/checkout/cart');
//        $I->wait(8);
//        $I->see($p);
//        $I->makeScreenshot($this->tag.'/7');
//        $I->wait(3);
        /****sonstige > 60 + sp1***/
//        $I->amOnPage('sperrgut1.html');
//        $I->wait(2);
//        $I->click('In den Warenkorb');
//        $I->amOnPage('/checkout/cart');
//        $I->wait(8);
//        $I->see($p);
//        $I->makeScreenshot($this->tag.'/8');
//        $I->amOnPage('esc/cart/clearcart');
//        $I->wait(3);


//        $p = '0,00 €';
//        /****sp1***/
//        $I->amOnPage('sperrgut1.html');
//        $I->wait(2);
//        $I->click('In den Warenkorb');
//        $I->amOnPage('/checkout/cart');
//        $I->wait(8);
//        $I->see($p);
//        $I->makeScreenshot($this->tag.'/9');
//        $I->amOnPage('esc/cart/clearcart');
//        $I->wait(3);
        $pdf = new \App\Tests\Pdf\GeneratePdf();
        $pdf->Generate($this->tag,$this->filename);


    }
}
