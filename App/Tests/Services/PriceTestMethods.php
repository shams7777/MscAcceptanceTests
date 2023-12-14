<?php

namespace App\Tests\Services;

class priceTestMethods
{
    public $tag = 'Price';
    public $filename = 'THPG_B2BDiscount_Price';
    public function _before(AcceptanceTester $I)
    {


    }

    // tests



    public function B2bdiscount_Login(AcceptanceTester $I)
    {
        $I->amOnPage('/');
        $I->click('Anmelden');
        $I->wait('2');
        $I->click('//*[@id="btn-cookie-allow"]');
        $I->fillField('#email','b2bdiscount10percent@example.com');
        $I->fillField('#pass','Muckidee8687!');
        $I->makeScreenshot($this->tag.'/0');
        $I->wait('2');
        $I->click('#send2');
        $this->user = 'b2bdiscount10percent@test.com';
        $I->wait('3');
        $I->amOnPage("rma/");
        $I->wait('3');
        $I->amOnPage('/');
        $I->wait('3');
    }
    public function Price_Test(AcceptanceTester $I)
    {

        $I->fillField('//*[@id="search"]', '187110');
        $I->wait('3');
        $I->click(' //*[@id="search_mini_form"]/div[2]/button');
        $I->makeScreenshot($this->tag.'/1');
        $I->scrollTo('//*[@id="its-accordion"]/div[3]/div/h4');
        $I->makeScreenshot($this->tag.'/2');
        $price =$I->grabTextFrom('//*[@id="product-price-841"]');
        codecept_debug($price);
        //$I->scrollTo('//*[@id="maincontent"]/div[2]/div/div[1]/div[3]');
        $I->wait('2');

        $I->click('#product-addtocart-button');
        $I->wait('5');
        $I->click('body > div.page-wrapper > header > div.header.content > div.minicart-wrapper.its > a');
        //$I->click('//*[@id="minicart-content-wrapper"]/div[2]/div[5]/div/a');
        $I->see($price);
        $I->makeScreenshot($this->tag.'/3');

        $I->amOnPage('/checkout/cart/');
        $I->wait('3');
        $I->see($price);
        $I->makeScreenshot($this->tag.'/4');

        $I->wait('5');
        $I->amOnPage('/checkout');
        $I->wait('10');
        $I->see($price);
        $I->wait('5');
        $I->makeScreenshot($this->tag.'/5');

        $I->amOnPage("/");
        $I->wait('5');
        $I->click('li.customer-welcome > span > button');
        $I->wait('3');
        $I->click('li.link.authorization-link > a');
        $I->wait('3');



    }



    public function B2b_Login(AcceptanceTester $I)
    {

        $I->amOnPage('/');
        $I->click('Anmelden');
        $I->wait('2');
        $I->click('//*[@id="btn-cookie-allow"]');
        $I->fillField('#email','b2bde@example.com');
        $I->fillField('#pass','Muckidee8687!');
        $I->makeScreenshot($this->tag.'/0');
        //$I->makeScreenshot('1');

        $I->wait('2');
        $I->click('#send2');
        $this->user = 'b2bde@test.com';
        $I->wait('3');
        $I->amOnPage("rma/");
        $I->wait('3');

    }
    public function B2c_Login(AcceptanceTester $I)
    {
        $I->amOnPage("/");
        $I->wait('2');
        $I->click('Anmelden');
        $I->wait('2');
        $I->click('//*[@id="btn-cookie-allow"]');
        $I->fillField('#email','b2c@example.com');
        $I->fillField('#pass','Muckidee8687!');
        $I->makeScreenshot($this->tag.'/0');
        $I->wait('3');
        $I->click('#send2');
        $this->user = 'b2c@test.com';
        $I->wait('3');
        $I->amOnPage("rma/");
        $I->wait('3');
    }
}