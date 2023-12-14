<?php

class AvailabilityTextCest
{
    public $tag = 'availability';
    public $filename='Availability_Text';
    public function _before(AcceptanceTester $I)
    {
    }

    // tests
    public function Availability(AcceptanceTester $I)
    {
        $I->amOnPage('/customer/account/login/');
        $I->wait(5);
//        $I->click('//*[@id="btn-cookie-consent-essential"]');
        $I->fillField('login[username]', 'customer@example.de');
        $I->fillField('login[password]', 'Muckidee8687!');
        $I->click('send');
        $I->wait(5);
        $I->amOnPage('/buecher-0.html');
        $I->wait(5);
        $I->see('Lieferzeit: nicht lieferbar');
        $I->makeScreenshot($this->tag.'/1');
        //$I->see('Artikel ist aktuell nicht verfügbar. Wir wissen nicht, ob und wann dieser wieder verfügbar ist.');
        $I->amOnPage('/buecher-greater-0.html');
        $I->see('Lieferzeit: 2 - 3 Werktage');
        $I->makeScreenshot($this->tag.'/2');
        $I->amOnPage('/ebook-future-date.html');
        $I->see(' Download ab dem');
        $I->makeScreenshot($this->tag.'/3');
        $I->amOnPage('/ebook-now-past.html');
        $I->see(' Sofort per Download verfügbar');
        $I->amOnPage('/buecher-future.html');
        $I->wait(5);
        $I->see('Lieferzeit: Versand ab dem');
        $I->makeScreenshot($this->tag.'/4');
        $I->amOnPage('/buecher-past-now-0.html');
        $I->see('Lieferzeit: nicht lieferbar');
        $I->makeScreenshot($this->tag.'/5');
        $I->amOnPage('/buecher-now-past-greater-0.html');
        $I->see('Lieferzeit: 2 - 3 Werktage');
        $I->makeScreenshot($this->tag.'/6');
        $I->amOnPage('/moebel-egal.html');
        $I->see('Lieferzeit: 6 - 8 Wochen');
        $I->makeScreenshot($this->tag.'/7');
        $I->amOnPage('/galerie-0.html');
        $I->see('Lieferzeit: nicht lieferbar');
        $I->makeScreenshot($this->tag.'/8');
        $I->amOnPage('/galerie-greater-0.html');
        $I->see('Lieferzeit: 10 Werktage');
        $I->makeScreenshot($this->tag.'/9');
        $I->wait(5);
        $pdf = new \App\Tests\Pdf\GeneratePdf();
        $pdf->Generate($this->tag,$this->filename);

    }
}
