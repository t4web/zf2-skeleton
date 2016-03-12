<?php

namespace Users;

use Helper\Fixtures;
use AcceptanceTester;

class StatusCest
{
    /**
     * @var Fixtures
     */
    protected $fixtures;

    protected function _inject(Fixtures $fixtures)
    {
        $this->fixtures = $fixtures;
    }

    public function newUserMustHaveStatusActive(AcceptanceTester $I)
    {
        $I->wantTo('New user must have status active');

        $I->amOnPage('/admin/users/user/list');
        $I->see('List of entities');
        $I->click('New entity');
        $I->fillField(['name' => 'name'], 'John');
        $I->click('Create');
        $I->see('John');
        $I->see('Active');
    }

    public function updateUserStatusToBlocked(AcceptanceTester $I)
    {
        $I->wantTo('Update user status to blocked');

        $user = $this->fixtures->user('John');

        $I->amOnPage('/admin/users/user/list');
        $I->see('John');
        $I->see('Active');
        $I->click('Edit');
        $I->seeOptionIsSelected('form select[name=status]', 'Active');
        $I->selectOption('form select[name=status]', 'Blocked');
        $I->click('Save');
        $I->see('John');
        $I->see('Blocked');
    }

    public function updateUserStatusToDeleted(AcceptanceTester $I)
    {
        $I->wantTo('Update user status to deleted');

        $user = $this->fixtures->user('John');

        $I->amOnPage('/admin/users/user/list');
        $I->see('John');
        $I->see('Active');
        $I->click('Edit');
        $I->seeOptionIsSelected('form select[name=status]', 'Active');
        $I->selectOption('form select[name=status]', 'Deleted');
        $I->click('Save');
        $I->see('John');
        $I->see('Deleted');
    }
}
