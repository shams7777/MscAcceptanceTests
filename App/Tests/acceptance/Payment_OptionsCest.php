<?php

class Payment_OptionsCest
{
    public $tag = 'payment';
    public $filename='M2_Payment_Options';
    public function _before(AcceptanceTester $I)
    {
    }

    // tests
    public function PaymentOptions(AcceptanceTester $I)
    {

        $I->amOnPage('/customer/account/login/');
        $I->wait(3);
//        $I->click('//*[@id="btn-cookie-consent-essential"]');
        $I->wait(3);
        $I->fillField('login[username]', 'customer@example.de');
        $I->fillField('login[password]', 'Muckidee8687!');
        $I->click('send');
        $I->wait(3);
        $I->amOnPage('/esc/cart/clearcart');
        $I->wait(3);
        $I->amOnPage('/der-kuechen-und-blumengarten.html');
        $I->wait(5);
        $I->click('In den Warenkorb');
        $I->wait(3);
        $I->makeScreenshot($this->tag.'/1');
        $I->amOnPage('/checkout');
        $I->wait(5);
        $I->click('Weiter');
        $I->wait(5);
//        $I->waitForElement('#ppplus iframe');
//        $I->switchToIFrame('#ppplus iframe');
        $I->dontSee('Rechnung');
        $I->makeScreenshot($this->tag.'/2');
        //$I->switchToIFrame();
        $I->amOnPage('/die-demokratische-sklavenmentalitaet.html');

        $I->wait(3);
        $I->click('In den Warenkorb');
        $I->wait(3);
        $I->makeScreenshot($this->tag.'/3');
        $I->amOnPage('/checkout');
        $I->wait(5);
        $I->click('Weiter');
        $I->wait(5);
//        $I->waitForElement('#ppplus iframe');
//        $I->switchToIFrame('#ppplus iframe');
        $I->see('Rechnung');
        $I->makeScreenshot($this->tag.'/4');
//        $I->switchToIFrame();
        $I->amOnPage('/es-gibt-kein-gutes-toeten-ebook.html');
        $I->wait(3);
        $I->click('In den Warenkorb');
        $I->wait(3);
        $I->makeScreenshot($this->tag.'/5');
        $I->amOnPage('/checkout');
        $I->wait(5);
        $I->click('Weiter');
        $I->wait(10);
//        $I->waitForElement('#ppplus iframe');
//        $I->switchToIFrame('#ppplus iframe');
        $I->dontSee('Rechnung');
        $I->makeScreenshot($this->tag.'/6');
//        $I->switchToIFrame();
        $pdf = new \App\Tests\Pdf\GeneratePdf();
        $pdf->Generate($this->tag,$this->filename);
      
    }
}
