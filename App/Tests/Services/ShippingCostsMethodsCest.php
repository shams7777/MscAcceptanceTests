<?php 

class ShippingCostsMethodsCest
{
  public $user;
    public $tag = 'Shipping';
    public $filename = 'THPG_B2C_DE_ShippingCosts';
    public function _before(AcceptanceTester $I)
    {
    }

    // tests
    public function B2B_Login(AcceptanceTester $I)
    {
        $I->amOnPage('/');
        $I->wait('5');
        $I->click('Anmelden');
        $I->wait('2');
        $I->click('//*[@id="btn-cookie-allow"]');
        $I->fillField('#email','b2bde@example.com');
        $I->fillField('#pass','Muckidee8687!');
        $I->makeScreenshot($this->tag.'/1');
        $I->wait('2');
        $I->click('#send2');
        $this->user = 'b2bde@test.com';
        $I->wait('3');
        $I->amOnPage("rma/");
        $I->wait('3');
    }
    public function B2C_Login(AcceptanceTester $I)
    {
        $I->amOnPage('/');
        $I->click('Anmelden');
        $I->wait('2');
        $I->click('//*[@id="btn-cookie-allow"]');
        $I->fillField('#email','b2c@example.com');
        $I->fillField('#pass','Muckidee8687!');
        $I->makeScreenshot($this->tag.'/1');
        $I->wait('2');
        $I->click('#send2');
        $this->user = 'b2c@test.com';

        $I->wait('3');
        $I->amOnPage("rma/");
        $I->wait('3');
    }
    public function B2B_EUR_Login(AcceptanceTester $I)
    {
        $I->amOnPage('/');
        $I->click('Anmelden');
        $I->wait('2');
        $I->click('//*[@id="btn-cookie-allow"]');
        $I->fillField('#email','b2beu@example.com');
        $I->fillField('#pass','Muckidee8687!');
        $I->makeScreenshot($this->tag.'/1');
        $I->wait('2');
        $I->click('#send2');
        $this->user = 'b2beu@test.com';
        $I->wait('3');
        $I->amOnPage("rma/");
        $I->wait('3');
    }
    public function B2C_EUR_Login(AcceptanceTester $I)
    {
        $I->amOnPage('/');
        $I->click('Anmelden');
        $I->wait('2');
        $I->click('//*[@id="btn-cookie-allow"]');
        $I->fillField('#email','b2ceu@example.com');
        $I->fillField('#pass','Muckidee8687!');
        $I->makeScreenshot('1');
        $I->wait('2');
        $I->click('#send2');
        $this->user = 'b2ceu@test.com';

        $I->wait('3');
        $I->amOnPage("rma/");
        $I->wait('3');
    }
    public function Logout(AcceptanceTester $I)
    {
        $I->click('/html/body/div[3]/header/div[1]/div/ul/li[2]/span/button');
        $I->click('Abmelden');
        $I->wait('3');
    }
    public function Normal_Product_Less(AcceptanceTester $I)
    {
        $p ='';
        codecept_debug('<500 €');
        codecept_debug($this->user);
        if($this->user == 'b2bde@test.com' )
        {
            $p = '5,04 €';
            codecept_debug($p);
        }
        else
            {
                $p = '6,00 €';
                codecept_debug($p);

              }
        $I->fillField('//*[@id="search"]', ' 182553');
        $I->wait('3');
        $I->click(' //*[@id="search_mini_form"]/div[2]/button');
        $I->wait('2');
        $I->click('//*[@id="product-addtocart-button"]/span');
        $I->wait('5');
        $I->amOnPage("/checkout/cart/");
        $I->wait('5');
        $I->makeScreenshot($this->tag.'/2');
       // $I->click('#block-shipping > div.title');

        $I->wait('3');
        //$I->scrollTo('//*[@id="s_method_its_shipping_its_shipping"]');
        //$I->click('/html/body/div[3]/main/div[2]/div/div[2]/div[1]/div[1]/div[2]/form[2]/fieldset/dl/dd/div[1]/input');
        $I->wait('8');
        $I->scrollTo('div.cart.main.actions > button');


        $I->makeScreenshot($this->tag.'/3');
        //$I->see($p);
        $price =$I->grabTextFrom('//*[@id="cart-totals"]/div/table/tbody/tr[2]/td/span');

        codecept_debug($price);
        $I->wait('3');

        if($p == $price){
            codecept_debug('same price!!!!!');
        }
        $I->amOnPage("rma/");
        $I->wait('3');



    }
    public function Normal_Product_More(AcceptanceTester $I)
    {
        $p ='';
        codecept_debug('>500 €');
        codecept_debug($this->user);
        if($this->user == 'b2bde@test.com' )
        {
            $p = '5,04 €';
            codecept_debug($p);
        }
        else
        {
            $p = '6,00 €';
            codecept_debug($p);

        }

        $I->fillField('//*[@id="search"]', ' 182553');
        $I->wait('3');
        $I->click(' //*[@id="search_mini_form"]/div[2]/button');
        $I->wait('2');
        $I->click('//*[@id="product-addtocart-button"]/span');
        $I->wait('2');
        $I->amOnPage("/checkout/cart/");
        $I->wait('5');
        $I->fillField('/html/body/div[3]/main/div[2]/div/div[2]/form/div[1]/table/tbody[1]/tr[1]/td[3]/div/div/label/input',100);
        $I->scrollTo('div.cart.main.actions > button');
        $I->click('div.cart.main.actions > button');;
        $I->wait('8');
        $I->makeScreenshot($this->tag.'/4');
       // $I->scrollTo('//*[@id="s_method_its_shipping_its_shipping"]');
        $I->click('#block-shipping > div.title');
        $I->wait('5');
        //$I->scrollTo('//*[@id="s_method_its_shipping_its_shipping"]');
        $I->click('//*[@id="s_method_its_shipping_its_shipping"]');


        $I->wait('8');
        $I->scrollTo('div.cart.main.actions > button');

        $I->makeScreenshot($this->tag.'/5');
        //$I->see($p);
        $price =$I->grabTextFrom('//*[@id="cart-totals"]/div/table/tbody/tr[2]/td/span');

        codecept_debug($price);
        $I->wait('3');

        if($price =='0,00 €'){
            codecept_debug('price exist!!!!!');
        }
        $I->amOnPage("rma/");
        $I->wait('3');


    }

    public function Shanon(AcceptanceTester $I)
    {
        $I->fillField('//*[@id="search"]', ' 145771');
        $I->wait('3');
        $I->click(' //*[@id="search_mini_form"]/div[2]/button');
        $I->wait('2');
        $I->click('//*[@id="product-addtocart-button"]/span');
        $I->wait('2');
        $I->amOnPage("/checkout/cart/");
        $I->wait('5');
        $I->makeScreenshot($this->tag.'/10');
        $I->click('#block-shipping > div.title');
        $I->wait('3');
        $I->scrollTo('/html/body/div[3]/main/div[2]/div/div[2]/div[1]/ul/li/button');
        $I->click('//*[@id="s_method_its_shipping_its_shipping"]');

        $I->wait('8');

        //$I->see($p);
        $price =$I->grabTextFrom('//*[@id="cart-totals"]/div/table/tbody/tr[2]/td/span');
        $I->scrollTo('div.cart.main.actions > button');
        codecept_debug($price);
        $I->makeScreenshot($this->tag.'/11');
        $I->wait('3');
        if($price =='0,00 €'){
            codecept_debug('price exist!!!!!');
        }
        $I->amOnPage("rma/");
        $I->wait('3');



    }
    public function Two_Bulky(AcceptanceTester $I)
    {
        codecept_debug('TWO BULKY');
        $I->fillField('//*[@id="search"]', ' 182657 ');
        $I->wait('3');
        $I->click(' //*[@id="search_mini_form"]/div[2]/button');
        $I->wait('2');
        $I->click('//*[@id="product-addtocart-button"]/span');
        $I->wait('2');
        $I->amOnPage("/checkout/cart/");
        $I->wait('3');

        $I->fillField('//*[@id="shopping-cart-table"]/tbody/tr[1]/td[3]/div/div/label/input',2);
        $I->wait('3');

        $I->click('div.cart.main.actions > button');
        $I->wait('8');
        $I->makeScreenshot($this->tag.'/16');
        $I->click('#block-shipping > div.title');
        $I->wait('5');
        $I->scrollTo('/html/body/div[3]/main/div[2]/div/div[2]/div[1]/ul/li/button');
        $I->click('//*[@id="s_method_its_shipping_its_shipping"]');
        $I->wait('5');
        $I->scrollTo('div.cart.main.actions > button');

        //$I->see($p);
        $price =$I->grabTextFrom('//*[@id="cart-totals"]/div/table/tbody/tr[2]/td/span');

        codecept_debug($price);
        $I->wait('3');
        $I->makeScreenshot($this->tag.'/17');

            if($price =='70,00 €'){
            //if($price =='83,30 €'){
            codecept_debug('price bulky is true!!!!!');
        }
        $I->amOnPage("rma/");
        $I->wait('3');



    }
    public function Shannon_Two_bulky(AcceptanceTester $I)
    {
        codecept_debug('Shannon + TWO BULKY');
        $I->fillField('//*[@id="search"]', ' 145771');
        $I->wait('3');
        $I->click(' //*[@id="search_mini_form"]/div[2]/button');
        $I->wait('2');
        $I->click('//*[@id="product-addtocart-button"]/span');
        $I->wait('2');
        $I->fillField('//*[@id="search"]', ' 182657 ');
        $I->wait('3');
        $I->click(' //*[@id="search_mini_form"]/div[2]/button');
        $I->wait('2');
        $I->click('//*[@id="product-addtocart-button"]/span');
        $I->wait('2');


        $I->amOnPage("/checkout/cart/");
        $I->wait('5');

        $I->fillField('//*[@id="shopping-cart-table"]/tbody[2]/tr[1]/td[3]/div/div/label/input',2);
        $I->wait('3');
        $I->makeScreenshot($this->tag.'/18');
        $I->click('div.cart.main.actions > button');
        $I->wait('8');

        $I->click('#block-shipping > div.title');
        $I->wait('5');
        $I->scrollTo('/html/body/div[3]/main/div[2]/div/div[2]/div[1]/ul/li/button');
        $I->click('//*[@id="s_method_its_shipping_its_shipping"]');


        $I->wait('8');

        //$I->see($p);
        $price =$I->grabTextFrom('//*[@id="cart-totals"]/div/table/tbody/tr[2]/td/span');

        $I->scrollTo('div.cart.main.actions > button');
        codecept_debug($price);
        $I->makeScreenshot($this->tag.'/19');
        $I->wait('3');

        //if($price == '70,00 €'){
        if($price =='83,30 €'){
            codecept_debug('price shannon + bulky is true!!!!!');
        }
        $I->amOnPage("rma/");
        $I->wait('3');

    }
    public function Less_Two_Bulky(AcceptanceTester $I)
    {
        $p ='';
        codecept_debug('<500 € + Two Bulky');
        codecept_debug($this->user);
        if($this->user == 'b2beu@test.com' )
        {
            $p = 5.04 ;
            codecept_debug($p);
        }
        else
        {
            $p = 6.00;
            codecept_debug($p);

        }
        $I->fillField('//*[@id="search"]', ' 182553');
        $I->wait('3');
        $I->click(' //*[@id="search_mini_form"]/div[2]/button');
        $I->wait('2');
        $I->click('//*[@id="product-addtocart-button"]/span');
        $I->wait('2');
        $I->fillField('//*[@id="search"]', ' 182657 ');
        $I->wait('3');
        $I->click(' //*[@id="search_mini_form"]/div[2]/button');
        $I->wait('2');
        $I->click('//*[@id="product-addtocart-button"]/span');
        $I->wait('2');
        $I->amOnPage("/checkout/cart/");
        $I->wait('5');
        $I->fillField('//*[@id="shopping-cart-table"]/tbody[2]/tr[1]/td[3]/div/div/label/input',2);
        $I->click('div.cart.main.actions > button');
        //$I->wait('5');
        //$I->see("We don't have as many quantity");
        $I->wait('5');
        $I->makeScreenshot($this->tag.'/12');
        $I->click('#block-shipping > div.title');
        $I->wait('3');
        $I->scrollTo('/html/body/div[3]/main/div[2]/div/div[2]/div[1]/ul/li/button');
        $I->click('//*[@id="s_method_its_shipping_its_shipping"]');

        $I->wait('8');
        $I->scrollTo('div.cart.main.actions > button');

        //$I->see($p);
        $price =$I->grabTextFrom('//*[@id="cart-totals"]/div/table/tbody/tr[2]/td/span');
        codecept_debug($price);

        //$s = floatval(str_replace(",", ".", $price)) - $p;
        $s = floatval(str_replace(",", ".", $price)) ;
        codecept_debug($s);


        $I->wait('3');
        $I->makeScreenshot($this->tag.'/13');
        //if($s == 70.00){
        if($price == 86.81){
            codecept_debug('bulky + under 500 true!!!!!');
        }
        $I->amOnPage("rma/");
        $I->wait('3');


    }
    public function More_Two_Bulky(AcceptanceTester $I)
    {
        $p ='';
        codecept_debug('<500 € + Two Bulky');
        codecept_debug($this->user);
        if($this->user == 'b2bde@test.com' )
        {
            $p = 5.04 ;
            codecept_debug($p);
        }
        else
        {
            $p = 6.00;
            codecept_debug($p);

        }
        $I->fillField('//*[@id="search"]', ' 182553');
        $I->wait('3');
        $I->click(' //*[@id="search_mini_form"]/div[2]/button');
        $I->wait('2');
        $I->click('//*[@id="product-addtocart-button"]/span');
        $I->wait('2');
        $I->fillField('//*[@id="search"]', ' 182657 ');
        $I->wait('3');
        $I->click(' //*[@id="search_mini_form"]/div[2]/button');
        $I->wait('2');
        $I->click('//*[@id="product-addtocart-button"]/span');
        $I->wait('2');
        $I->wait('3');
        $I->amOnPage("/checkout/cart/");
        $I->wait('5');
        $I->fillField('//*[@id="shopping-cart-table"]/tbody[1]/tr[1]/td[3]/div/div/label/input',25);
        $I->fillField('//*[@id="shopping-cart-table"]/tbody[2]/tr[1]/td[3]/div/div/label/input',2);
        $I->click('div.cart.main.actions > button');
        //$I->wait('5');
        //$I->see("We don't have as many quantity");
        $I->wait('3');
        $I->makeScreenshot($this->tag.'/14');
        $I->wait('3');
        $I->click('#block-shipping > div.title');
        $I->wait('3');
        $I->scrollTo('/html/body/div[3]/main/div[2]/div/div[2]/div[1]/ul/li/button');
        $I->click('//*[@id="s_method_its_shipping_its_shipping"]');

        $I->wait('8');

        //$I->see($p);
        $price =$I->grabTextFrom('//*[@id="cart-totals"]/div/table/tbody/tr[2]/td/span');
        codecept_debug($price);
        $I->scrollTo('div.cart.main.actions > button');
        $s = floatval(str_replace(",", ".", $price));
        codecept_debug($s);
        $I->makeScreenshot($this->tag.'/15');


        $I->wait('3');

        //if($s == 70.00){
            if($price == 83.3){
            codecept_debug('bulky + more 500 true!!!!!');
        }
        $I->amOnPage("rma/");
        $I->wait('3');

    }
    public function Normal_Product_ShanonMore(AcceptanceTester $I)
    {
        $p ='';
        codecept_debug('>500 € + Shannon');
        codecept_debug($this->user);
        if($this->user == 'b2bde@test.com' )
        {
            $p = '5,04 €';
            codecept_debug($p);
        }
        else
        {
            $p = '6,00 €';
            codecept_debug($p);

        }
        $I->fillField('//*[@id="search"]', ' 182553');
        $I->wait('3');
        $I->click(' //*[@id="search_mini_form"]/div[2]/button');
        $I->wait('2');
        $I->click('//*[@id="product-addtocart-button"]/span');
        $I->wait('2');
        $I->fillField('//*[@id="search"]', ' 145771');
        $I->wait('3');
        $I->click(' //*[@id="search_mini_form"]/div[2]/button');
        $I->wait('2');
        $I->click('//*[@id="product-addtocart-button"]/span');
        $I->wait('2');
        $I->wait('2');
        $I->amOnPage("/checkout/cart/");
        $I->wait('5');

        $I->fillField('//*[@id="shopping-cart-table"]/tbody/tr[1]/td[3]/div/div/label/input',100);
        $I->wait('3');
        $I->click('div.cart.main.actions > button');
        $I->wait('5');

        $I->makeScreenshot($this->tag.'/8');
        $I->click('#block-shipping > div.title');
        $I->wait('3');
        $I->scrollTo('/html/body/div[3]/main/div[2]/div/div[2]/div[1]/ul/li/button');
        $I->click('//*[@id="s_method_its_shipping_its_shipping"]');

        $I->wait('8');


        //$I->see($p);
        $price =$I->grabTextFrom('//*[@id="cart-totals"]/div/table/tbody/tr[2]/td/span');
        $I->scrollTo('div.cart.main.actions > button');
        codecept_debug($price);
        $I->makeScreenshot($this->tag.'/9');
        $I->wait('3');
        if($price =='0,00 €'){
            codecept_debug('price exist!!!!!');
        }
        $I->amOnPage("rma/");
        $I->wait('3');






    }
    public function Clear_cart(AcceptanceTester $I)
    {
        $I->amOnPage("rma/");
        $I->wait('3');
    }
    public function Normal_Product_Shanon(AcceptanceTester $I)
    {
        $p ='';
        codecept_debug('<500 € + Shannon');
        codecept_debug($this->user);
        if($this->user == 'b2beu@test.com' )
        {
            $p = '16,81 €';
            codecept_debug($p);
        }
        else
        {
            $p = '20,00 €';
            codecept_debug($p);

        }
        $I->fillField('//*[@id="search"]', ' 182553');
        $I->wait('3');
        $I->click(' //*[@id="search_mini_form"]/div[2]/button');
        $I->wait('2');
        $I->click('//*[@id="product-addtocart-button"]/span');
        $I->wait('2');
        $I->fillField('//*[@id="search"]', ' 145771');
        $I->wait('3');
        $I->click(' //*[@id="search_mini_form"]/div[2]/button');
        $I->wait('2');
        $I->click('//*[@id="product-addtocart-button"]/span');
        $I->wait('2');
        $I->amOnPage("/checkout/cart/");
        $I->wait('5');
        $I->makeScreenshot($this->tag.'/6');

        $I->click('#block-shipping > div.title');
        $I->wait('3');
        //$I->scrollTo('//*[@id="s_method_its_shipping_its_shipping"]');
        $I->scrollTo('/html/body/div[3]/main/div[2]/div/div[2]/div[1]/ul/li/button');
        $I->click('//*[@id="s_method_its_shipping_its_shipping"]');

        $I->wait('8');

        //$I->see($p);
        $price =$I->grabTextFrom('//*[@id="cart-totals"]/div/table/tbody/tr[2]/td/span');
        $I->scrollTo('div.cart.main.actions > button');
        codecept_debug($price);
        $I->makeScreenshot($this->tag.'/7');
        $I->wait('3');
        if($price == $p){
            codecept_debug('price exist!!!!!');
        }
        $I->amOnPage("rma/");
        $I->wait('3');



    }




    public function Normal_Less_Shanon_TwoBulky(AcceptanceTester $I)
    {     codecept_debug('TWO BULKY + Shannon + normal produt < 500');
        $p =0;
        codecept_debug($this->user);
        if($this->user == 'b2beu@test.com' )
        {
            $p = 5.04 ;
            codecept_debug($p);
        }
        else
        {
            $p = 6.00;
            codecept_debug($p);

        }
        $I->fillField('//*[@id="search"]', ' 182657 ');
        $I->wait('3');
        $I->click(' //*[@id="search_mini_form"]/div[2]/button');
        $I->wait('2');
        $I->click('//*[@id="product-addtocart-button"]/span');
        $I->wait('5');
        $I->fillField('//*[@id="search"]', ' 182553');
        $I->wait('3');
        $I->click(' //*[@id="search_mini_form"]/div[2]/button');
        $I->wait('2');
        $I->click('//*[@id="product-addtocart-button"]/span');
        $I->wait('2');
        $I->fillField('//*[@id="search"]', ' 145771');
        $I->wait('3');
        $I->click(' //*[@id="search_mini_form"]/div[2]/button');
        $I->wait('2');
        $I->click('//*[@id="product-addtocart-button"]/span');
        $I->wait('2');

        $I->amOnPage("/checkout/cart/");
        $I->wait('5');

        $I->fillField('//*[@id="shopping-cart-table"]/tbody/tr[1]/td[3]/div/div/label/input',2);
        $I->wait('3');
        $I->click('div.cart.main.actions > button');
        $I->wait('8');
        $I->makeScreenshot($this->tag.'/20');
        //$I->makeScreenshot('19');
        $I->click('#block-shipping > div.title');
        $I->wait('5');
        $I->scrollTo('/html/body/div[3]/main/div[2]/div/div[2]/div[1]/ul/li/button');
        $I->click('//*[@id="s_method_its_shipping_its_shipping"]');


        $I->wait('8');

        //$I->see($p);
        $price =$I->grabTextFrom('//*[@id="cart-totals"]/div/table/tbody/tr[2]/td/span');

        $I->scrollTo('div.cart.main.actions > button');
        codecept_debug($price);

        $I->wait('3');
        $s = floatval(str_replace(",", ".", $price)) - $p;
        codecept_debug($s);


        $I->wait('3');
        $I->makeScreenshot($this->tag.'/21');
        //if($s == 75.04){
        if($price == 86.81){
            codecept_debug('bulky +Shannon + under 500 true!!!!!');
        }
        $I->amOnPage("rma/");
        $I->wait('3');
    }

    public function Normal_More_Shanon_TwoBulky(AcceptanceTester $I)
    {     codecept_debug('TWO BULKY + Shannon + normal produt < 500');
        $p =0;
        codecept_debug($this->user);
        if($this->user == 'b2bde@test.com' )
        {
            $p = 5.04 ;
            codecept_debug($p);
        }
        else
        {
            $p = 6.00;
            codecept_debug($p);

        }
        $I->fillField('//*[@id="search"]', ' 182657 ');
        $I->wait('3');
        $I->click(' //*[@id="search_mini_form"]/div[2]/button');
        $I->wait('2');
        $I->click('//*[@id="product-addtocart-button"]/span');
        $I->wait('5');
        $I->fillField('//*[@id="search"]', ' 145771');
        $I->wait('3');
        $I->click(' //*[@id="search_mini_form"]/div[2]/button');
        $I->wait('2');
        $I->click('//*[@id="product-addtocart-button"]/span');
        $I->wait('2');
        $I->fillField('//*[@id="search"]', ' 182553');
        $I->wait('3');
        $I->click(' //*[@id="search_mini_form"]/div[2]/button');
        $I->wait('2');
        $I->click('//*[@id="product-addtocart-button"]/span');
        $I->wait('2');
        $I->wait('5');
        $I->amOnPage("/checkout/cart/");
        $I->wait('5');
        $I->fillField('//*[@id="shopping-cart-table"]/tbody/tr[1]/td[3]/div/div/label/input',2);
        $I->fillField('//*[@id="shopping-cart-table"]/tbody[3]/tr[1]/td[3]/div/div/label/input',15);
        $I->wait('3');
        $I->click('div.cart.main.actions > button');
        $I->wait('8');
        $I->makeScreenshot($this->tag.'/22');
        $I->click('#block-shipping > div.title');
        $I->wait('5');
        $I->scrollTo('/html/body/div[3]/main/div[2]/div/div[2]/div[1]/ul/li/button');
        $I->click('//*[@id="s_method_its_shipping_its_shipping"]');


        $I->wait('8');

        //$I->see($p);
        $price =$I->grabTextFrom('//*[@id="cart-totals"]/div/table/tbody/tr[2]/td/span');

        $I->scrollTo('div.cart.main.actions > button');
        codecept_debug($price);
        $I->makeScreenshot($this->tag.'/23');
        $I->wait('3');
        $s = floatval(str_replace(",", ".", $price));
        codecept_debug($s);


        $I->wait('3');

        //if($s == 70.00){
        if($price == 83.30){
            codecept_debug('bulky +Shannon + more 500 true!!!!!');
        }
        $I->amOnPage("rma/");
        $I->wait('3');
    }



    /**********************************************************************/
    public function Normal_Product_Less_EUR(AcceptanceTester $I)
    {
        $p ='';
        codecept_debug('<500 €');
        codecept_debug($this->user);
        if($this->user == 'b2beu@test.com' )
        {
            $p = '16,81 €';
            codecept_debug($p);
        }
        else
        {
            $p = '20,00 €';
            codecept_debug($p);

        }
        $I->amOnPage("leuchten/werkstattleuchten");
        $I->wait('2');

        $I->click('//*[@id="maincontent"]/div[3]/div[1]/div[3]/ol/li[1]/div/div[3]/div/div/form/button');
        $I->wait('2');
        $I->amOnPage("/checkout/cart/");
        $I->wait('5');
        $I->makeScreenshot('2');
        $I->click('#block-shipping > div.title');
        $I->wait('3');
        $I->scrollTo('/html/body/div[3]/main/div[2]/div/div[2]/div[1]/ul/li/button');
        $I->click('//*[@id="s_method_its_shipping_its_shipping"]');
        $I->wait('8');
        $I->scrollTo('div.cart.main.actions > button');



        //$I->see($p);
        $price =$I->grabTextFrom('//*[@id="cart-totals"]/div/table/tbody/tr[2]/td/span');

        codecept_debug($price);
        $I->wait('3');
        $I->makeScreenshot('3');
        if($p == $price){
            codecept_debug('same price!!!!!');
        }
        $I->amOnPage("rma/");
        $I->wait('3');


    }
    public function Normal_Product_More_EUR(AcceptanceTester $I)
    {
                 codecept_debug('Normal 12 kg + Shanon');
        $p ='';

        codecept_debug($this->user);
        if($this->user == 'b2beu@test.com' )
        {
            $p = '13,30 €';
            codecept_debug($p);
        }
        else
        {
            $p = '15,43 €';
            codecept_debug($p);

        }
        $I->amOnPage("leuchten/");
        $I->scrollTo('//*[@id="maincontent"]/div[2]/div[1]/div[3]/ol/li[2]/div');
        $I->wait('2');
        // $I->moveMouseOver('//*[@id="maincontent"]/div[3]/div[1]/div[3]/ol/li[1]/div');
        $I->click('//*[@id="maincontent"]/div[2]/div[1]/div[3]/ol/li[2]/div/div[3]/div/div/form/button/span');
        $I->wait('2');
        $I->amOnPage("mobel-und-einrichtung/");
        $I->wait('5');
        $I->scrollTo('//*[@id="maincontent"]/div[3]/div[1]/div[3]/ol/li/div/div[3]/div/div/form/button/span');
        $I->click('//*[@id="maincontent"]/div[3]/div[1]/div[3]/ol/li/div/div[3]/div/div/form/button/span');
        $I->wait('5');
        $I->scrollTo('  //*[@id="option-label-auspraegung_3-395"]');
        $I->wait('2');
        $I->click('//*[@id="option-label-auspraegung_3-395-item-5452"]');
        $I->wait('2');
        $I->click('//*[@id="option-label-auspraegung_4-396-item-5457"]');
        $I->wait('2');
        $I->click(' //*[@id="product-addtocart-button"]');
        $I->wait('2');
        $I->amOnPage("/checkout/cart/");
        $I->wait('10');
        $I->makeScreenshot('4');


        $I->fillField('//*[@id="shopping-cart-table"]/tbody/tr[1]/td[3]/div/div/label/input',4);
        $I->click('//*[@id="form-validate"]/div[2]/button[2]');
        $I->wait('8');
        $price =$I->grabTextFrom(' //*[@id="cart-totals"]/div/table/tbody/tr[2]/td/span');
        $I->makeScreenshot('5');
        codecept_debug($price);
        $I->see($p);
        if($price == $p)
        {
            codecept_debug('truee');
            $p1=str_replace(",",".",$price);
            codecept_debug(floatval($p1));
            //preg_match_all('/\d+(\.\d+)?/', $price, $matches);
            //codecept_debug($matches[0]*2);
        }
        $I->amOnPage("rma/");
        $I->wait('3');




    }
    public function Normal_TwoBulky_EUR(AcceptanceTester $I)
    {
        codecept_debug('Normal 12 kg + 2Bulky');
        $p ='';
        codecept_debug('<500 €');
        codecept_debug($this->user);
        if($this->user == 'b2beu@test.com' )
        {
            $p = '13,30 €';
            codecept_debug($p);
        }
        else
        {
            $p = '15,43 €';
            codecept_debug($p);

        }
        $I->amOnPage("leuchten/");
        $I->scrollTo('//*[@id="maincontent"]/div[2]/div[1]/div[3]/ol/li[2]/div');
        $I->wait('2');
        // $I->moveMouseOver('//*[@id="maincontent"]/div[3]/div[1]/div[3]/ol/li[1]/div');
        $I->click('//*[@id="maincontent"]/div[2]/div[1]/div[3]/ol/li[1]/div/div[3]/div/div/form/button/span');
        $I->wait('2');
        $I->click('//*[@id="maincontent"]/div[2]/div[1]/div[3]/ol/li[2]/div/div[3]/div/div/form/button/span');
        $I->wait('2');

        $I->amOnPage("/checkout/cart/");
        $I->wait('10');
        $I->scrollTo('//*[@id="shopping-cart-table"]/tbody[2]/tr[2]/td/div/a[1]');
        $I->wait('3');
        $I->scrollTo('//*[@id="shopping-cart-table"]/tbody[1]/tr[1]/td[3]/div/div/label');
        $I->makeScreenshot('6');
        $price =$I->grabTextFrom(' //*[@id="cart-totals"]/div/table/tbody/tr[2]/td/span');
        codecept_debug($price);

        $I->fillField('//*[@id="shopping-cart-table"]/tbody/tr[1]/td[3]/div/div/label/input',2);
        $I->fillField('//*[@id="shopping-cart-table"]/tbody[2]/tr[1]/td[3]/div/div/label/input',4);
        $I->click('//*[@id="form-validate"]/div[2]/button[2]');
        $I->wait('10');
        $I->scrollTo('//*[@id="shopping-cart-table"]/tbody[1]/tr[1]/td[3]/div/div/label');
        $I->makeScreenshot('7');

        $price2 =$I->grabTextFrom(' //*[@id="cart-totals"]/div/table/tbody/tr[2]/td/span');
        $s=(floatval(str_replace(",",".",$price2)) - floatval(str_replace(",",".",$p))) / 2 ;
        codecept_debug($s);
        codecept_debug(floatval(str_replace(",",".",$price2)));
        $I->wait('3');
        $price =floatval(str_replace(",",".",$price2)) - floatval(str_replace(",",".",$p));
        codecept_debug($price);
        codecept_debug(fmod($price,$s));
        if(fmod($price,$s) == 0 )
        {
            codecept_debug('test 2 Bulky_Normal success');

        }
        $I->amOnPage("rma/");
        $I->wait('3');

        }
    public function Normal_Shanon_TwoBulky_EUR(AcceptanceTester $I)
    {        codecept_debug('Normal 12 kg + 2Bulky + Shanon');


        $p ='';
        codecept_debug('<500 €');
        codecept_debug($this->user);
        if($this->user == 'b2beu@test.com' )
        {
            $p = '13,30 €';
            codecept_debug($p);
        }
        else
        {
            $p = '15,43 €';
            codecept_debug($p);

        }
        $I->amOnPage("leuchten/");
        $I->scrollTo('//*[@id="maincontent"]/div[2]/div[1]/div[3]/ol/li[2]/div');
        $I->wait('2');
        // $I->moveMouseOver('//*[@id="maincontent"]/div[3]/div[1]/div[3]/ol/li[1]/div');
        $I->click('//*[@id="maincontent"]/div[2]/div[1]/div[3]/ol/li[1]/div/div[3]/div/div/form/button/span');
        $I->wait('2');
        $I->click('//*[@id="maincontent"]/div[2]/div[1]/div[3]/ol/li[2]/div/div[3]/div/div/form/button/span');
        $I->wait('2');
        $I->amOnPage("mobel-und-einrichtung/");
        $I->wait('5');
        $I->scrollTo('//*[@id="maincontent"]/div[3]/div[1]/div[3]/ol/li/div/div[3]/div/div/form/button/span');
        $I->click('//*[@id="maincontent"]/div[3]/div[1]/div[3]/ol/li/div/div[3]/div/div/form/button/span');
        $I->wait('5');
        $I->scrollTo('  //*[@id="option-label-auspraegung_3-395"]');
        $I->wait('2');
        $I->click('//*[@id="option-label-auspraegung_3-395-item-5452"]');
        $I->wait('2');
        $I->click('//*[@id="option-label-auspraegung_4-396-item-5457"]');
        $I->wait('2');
        $I->click(' //*[@id="product-addtocart-button"]');
        $I->wait('2');

        $I->amOnPage("/checkout/cart/");
        $I->wait('7');
        $I->scrollTo('//*[@id="shopping-cart-table"]/tbody[1]/tr[1]/td[3]/div/div/label');
        $I->wait('3');
        $I->makeScreenshot('8');
        $price =$I->grabTextFrom(' //*[@id="cart-totals"]/div/table/tbody/tr[2]/td/span');
        codecept_debug($price);

        $I->fillField('//*[@id="shopping-cart-table"]/tbody/tr[1]/td[3]/div/div/label/input',2);
        $I->fillField('//*[@id="shopping-cart-table"]/tbody[2]/tr[1]/td[3]/div/div/label/input',4);
        $I->click('//*[@id="form-validate"]/div[2]/button[2]');
        $I->wait('8');
        $price2 =$I->grabTextFrom(' //*[@id="cart-totals"]/div/table/tbody/tr[2]/td/span');
        $I->scrollTo('//*[@id="shopping-cart-table"]/tbody[1]/tr[1]/td[3]/div/div/label');

        $I->makeScreenshot('9');

        $s=(floatval(str_replace(",",".",$price2)) - floatval(str_replace(",",".",$p))) / 2 ;
        codecept_debug($s);
        codecept_debug(floatval(str_replace(",",".",$price2)));
        $I->wait('3');
        $price =floatval(str_replace(",",".",$price2)) - floatval(str_replace(",",".",$p));
        codecept_debug($price);
        codecept_debug(fmod($price,$s));
        if(fmod($price,$s) == 0 )
        {
            codecept_debug('test 2 Bulky_Normal_shanon success');

        }
        $I->amOnPage("rma/");
        $I->wait('3');
        }


    public function Only_TwoBulky_EUR(AcceptanceTester $I)
    {
        $I->amOnPage("rma/");
        $I->wait('3');
        codecept_debug('Only 2Bulky');

        $I->amOnPage("leuchten/");
        $I->scrollTo('//*[@id="maincontent"]/div[2]/div[1]/div[3]/ol/li[2]/div');
        $I->wait('2');
        // $I->moveMouseOver('//*[@id="maincontent"]/div[3]/div[1]/div[3]/ol/li[1]/div');
        $I->click('//*[@id="maincontent"]/div[2]/div[1]/div[3]/ol/li[1]/div/div[3]/div/div/form/button/span');
        $I->wait('2');
        $I->amOnPage("/checkout/cart/");
        $I->wait('8');
        $I->makeScreenshot('10');

        $price =$I->grabTextFrom(' //*[@id="cart-totals"]/div/table/tbody/tr[2]/td/span');
        codecept_debug($price);
        $I->fillField('//*[@id="shopping-cart-table"]/tbody/tr[1]/td[3]/div/div/label/input',2);
        $I->click('//*[@id="form-validate"]/div[2]/button[2]');
        $I->wait('8');
        $I->makeScreenshot('11');

        $price2 =$I->grabTextFrom(' //*[@id="cart-totals"]/div/table/tbody/tr[2]/td/span');
        codecept_debug($price2);
       codecept_debug(fmod(floatval(str_replace(",",".",$price2)) ,floatval(str_replace(",",".",$price))));
        if((fmod(floatval(str_replace(",",".",$price2)) ,floatval(str_replace(",",".",$price)))) == 0)
        {
            codecept_debug('test Only 2 Bulky success');

        }
        $I->amOnPage("rma/");
        $I->wait('3');
    }

    public function Shanon_TwoBulky(AcceptanceTester $I)
    {
        codecept_debug('Shanon + 2Bulky');

        $I->amOnPage("leuchten/");
        $I->scrollTo('//*[@id="maincontent"]/div[2]/div[1]/div[3]/ol/li[2]/div');
        $I->wait('2');
        // $I->moveMouseOver('//*[@id="maincontent"]/div[3]/div[1]/div[3]/ol/li[1]/div');
        $I->click('//*[@id="maincontent"]/div[2]/div[1]/div[3]/ol/li[1]/div/div[3]/div/div/form/button/span');
        $I->wait('2');
        $I->amOnPage("mobel-und-einrichtung/");
        $I->wait('5');
        $I->scrollTo('//*[@id="maincontent"]/div[3]/div[1]/div[3]/ol/li/div/div[3]/div/div/form/button/span');
        $I->click('//*[@id="maincontent"]/div[3]/div[1]/div[3]/ol/li/div/div[3]/div/div/form/button/span');
        $I->wait('5');
        $I->scrollTo('  //*[@id="option-label-auspraegung_3-395"]');
        $I->wait('2');
        $I->click('//*[@id="option-label-auspraegung_3-395-item-5452"]');
        $I->wait('2');
        $I->click('//*[@id="option-label-auspraegung_4-396-item-5457"]');
        $I->wait('2');
        $I->click(' //*[@id="product-addtocart-button"]');
        $I->wait('2');

        $I->amOnPage("/checkout/cart/");
        $I->wait('10');
        $I->scrollTo('//*[@id="shopping-cart-table"]/tbody[1]/tr[1]/td[3]/div/div/label');
        $I->makeScreenshot('12');
        $price =$I->grabTextFrom(' //*[@id="cart-totals"]/div/table/tbody/tr[2]/td/span');
        codecept_debug($price);
        $I->fillField('//*[@id="shopping-cart-table"]/tbody/tr[1]/td[3]/div/div/label/input',2);
        $I->click('//*[@id="form-validate"]/div[2]/button[2]');
        $I->wait('8');
        $price2 =$I->grabTextFrom(' //*[@id="cart-totals"]/div/table/tbody/tr[2]/td/span');
        $I->scrollTo('//*[@id="shopping-cart-table"]/tbody[1]/tr[1]/td[3]/div/div/label');
        $I->makeScreenshot('13');

        codecept_debug($price2);
        codecept_debug(fmod(floatval(str_replace(",",".",$price2)) ,floatval(str_replace(",",".",$price))));
        if((fmod(floatval(str_replace(",",".",$price2)) ,floatval(str_replace(",",".",$price)))) == 0)
        {
            codecept_debug('test Shanon 2 Bulky success');

        }
        $I->amOnPage("rma/");
        $I->wait('3');
    }


        }
