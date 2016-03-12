<?php

namespace Users;

use Helper\Fixtures;
use AcceptanceTester;

class CrudCest
{
    /**
     * @var Fixtures
     */
    protected $fixtures;

    protected function _inject(Fixtures $fixtures)
    {
        $this->fixtures = $fixtures;
    }

    public function createNewUser(AcceptanceTester $I)
    {
        $I->wantTo('Create user');

        $I->amOnPage('/admin/users/user/list');
        $I->see('List of entities');
        $I->click('New entity');
        $I->see('Create user');
        $I->fillField(['name' => 'name'], 'John');
        $I->click('Create');
        $I->seeInCurrentUrl('/admin/users/user/list');
        $I->see('John');
    }

    public function checkCreateUserValidation(AcceptanceTester $I)
    {
        $I->wantTo('Check create user validation');

        $I->amOnPage('/admin/users/user/new');
        $I->fillField(['name' => 'name'], 'sa');
        $I->click('Create');
        $I->seeInCurrentUrl('/admin/users/user/create');
        $I->seeInField(['name' => 'name'], 'sa');
        $I->see('The input is less than 3 characters long');
    }

    public function updateUser(AcceptanceTester $I)
    {
        $I->wantTo('Update user');

        $user = $this->fixtures->user('John');

        $I->amOnPage('/admin/users/user/list');
        $I->see('John');
        $I->click('Edit');
        $I->seeInCurrentUrl('/admin/users/user/read/' . $user['id']);
        $I->seeInField(['name' => 'name'], 'John');
        $I->fillField(['name' => 'name'], 'John Bero');
        $I->click('Save');
        $I->seeInCurrentUrl('/admin/users/user/list');
        $I->see('John Bero');
    }

    public function checkUpdateUserValidation(AcceptanceTester $I)
    {
        $I->wantTo('Check update user validation');

        $user = $this->fixtures->user('John');

        $I->amOnPage('/admin/users/user/read/' . $user['id']);
        $I->seeInField(['name' => 'name'], 'John');
        $I->fillField(['name' => 'name'], 'Jo');
        $I->click('Save');
        $I->seeInCurrentUrl('/admin/users/user/update/' . $user['id']);
        $I->seeInField(['name' => 'name'], 'Jo');
        $I->see('The input is less than 3 characters long');
    }

    public function deleteUser(AcceptanceTester $I)
    {
        $I->wantTo('Delete user');

        $user = $this->fixtures->user('John');

        $I->amOnPage('/admin/users/user/list');
        $I->see('John');
        $I->click('Delete');
        $I->seeInCurrentUrl('/admin/users/user/delete/' . $user['id'] . '/confirm');
        $I->see('Delete entity confirmation');
        $I->click('Delete');
        $I->seeInCurrentUrl('/admin/users/user/list');
        $I->dontSee('John');
    }

    public function get404OnReadUnknownUser(AcceptanceTester $I)
    {
        $I->wantTo('Get 404 error when try to get non existing user');

        $I->sendRequest('GET', '/admin/users/user/read/123', []);
        $I->see('A 404 error occurred');
        $I->see('The requested resource was not found by requested criteria');
        $I->seeResponseCodeIs(404);
    }

    public function get404OnUpdateUnknownUser(AcceptanceTester $I)
    {
        $I->wantTo('Get 404 error when try to update non existing user');

        $I->sendRequest('POST', '/admin/users/user/update/123', []);
        $I->see('A 404 error occurred');
        $I->see('The requested resource was not found by requested criteria');
        $I->seeResponseCodeIs(404);
    }

    public function get405OnUpdateWithGetMethod(AcceptanceTester $I)
    {
        $I->wantTo('Get 405 error when try to update with GET method');

        $I->sendRequest('GET', '/admin/users/user/update/123', []);
        $I->see('A 404 error occurred');
        $I->see('The requested method not allowed');
        $I->seeResponseCodeIs(405);
    }

    public function get405OnCreateWithGetMethod(AcceptanceTester $I)
    {
        $I->wantTo('Get 405 error when try to create with GET method');

        $I->sendRequest('GET', '/admin/users/user/create', []);
        $I->see('A 404 error occurred');
        $I->see('The requested method not allowed');
        $I->seeResponseCodeIs(405);
    }
}