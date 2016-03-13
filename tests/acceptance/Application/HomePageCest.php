<?php

namespace Test\Acceptance\Application;

use AcceptanceTester;

class HomePageCest
{
    public function checkMainPage(AcceptanceTester $I)
    {
        $I->wantTo('See main page work');

        $I->amOnPage('/');
        $I->see('Welcome to T4web ZF2 skeleton');
    }
}
