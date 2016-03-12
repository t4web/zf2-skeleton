<?php

namespace Challenges;

use Helper\Fixtures;
use AcceptanceTester;

class LogoCest
{
    public function checkMainPage(AcceptanceTester $I)
    {
        $I->wantTo('See main page work');

        $I->amOnPage('/');
        $I->see('Welcome to T4web ZF2 skeleton');
    }
}
