<?php

class GeneralTestsCest
{
    public $tag = 'general';
    public $filename='General_Tests';
    public function _before(AcceptanceTester $I)
    {
    }

    // tests
    public function GeneralTests(AcceptanceTester $I)
    {   $I->amOnPage('/');
        $I->wait(5);
        //$I->click('//*[@id="btn-cookie-consent-essential"]');
//        $I->fillField('q', '7948075156');
        $I->wait('3');
//        $I->click('//*[@id="search_mini_form"]/div[2]/button');
        $I->amOnPage('/die-neuesten-streiche-der-schuldbuerger.html');
        $I->wait('5');
        $I->makeScreenshot($this->tag.'/1');
        $I->see('MwSt');
        $I->click('#product-addtocart-button');
        $I->wait('3');
        $I->amOnPage('/checkout');
        $I->wait('5');
        $I->makeScreenshot($this->tag.'/2');
        $I->see('Gästekasse ist deaktiviert.');
        $I->amOnPage('/customer/account/login/');
        $I->fillField('login[username]', 'customer@example.de');
        $I->fillField('login[password]', 'Muckidee8687!');
        $I->click('send');
        $I->wait(5);
        $I->amOnPage('/');
        $I->wait(3);
        $I->makeScreenshot($this->tag.'/3');
        $pdf = new \App\Tests\Pdf\GeneratePdf();
        $pdf->Generate($this->tag,$this->filename);

    }
}
