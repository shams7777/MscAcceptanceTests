<?php


namespace Codeception\Module;


class AcceptanceHelper extends \Codeception\Module
{
    public function getCurrentUrl()
    {
        return $this->getModule('WebDriver')->_getCurrentUri();
    }

}