<?php


namespace App\Config;


class config
{
    public $Baseurl = 'https://onroadservicestest.trafineo.com/eets/registration/';
    public $urls = array(
        'url0' => '/eets/registration/',
        'url1' => '/eets/registration/login',
        'url2' => '/admin/vehicle',
        'url3' => '/daten/showalteu',
        'url4' => '/en_gb/united-kingdom/home/products-and-services/bp-eu-fleet.html',
        'url5' => '/de/global/fleet_solutions.html',
        'url6' => '/eets/registration/admin',
        'url7' => '/admin/customers',
        'url8' => '/account/customeraddress',
        'url9' => '/login',
    );
    public $BpUser = array(
        'username' => 'acceptanceBpCustomerTester',
        'password' => 'xxx'
    );
    public $AralUser = array(
        'username' => 'acceptanceAralCustomerTester',
        'password' => 'xxx'
    );
    public $AgentUser = array(
        'username' => 'acceptanceAgentBpTester',
        'password' => 'xxx'
    );
}
