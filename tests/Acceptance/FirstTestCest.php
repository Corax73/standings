<?php


namespace Tests\Acceptance;

use Tests\Support\AcceptanceTester;

class FirstTestCest
{
    public function _before(AcceptanceTester $I)
    {
    }

    // tests
    public function tryToTest1(AcceptanceTester $I)
    {
        $I->amOnPage('/');
        $I->seeResponseCodeIs(200);
        $I->see('Compilation');
    }

    public function tryToTest2(AcceptanceTester $I)
    {
        $I->amOnPage('/');
        $I->seeResponseCodeIs(404);
    }

    public function tryToTest3(AcceptanceTester $I)
    {
        $I->amOnPage('/');
        $I->see('1');
    }
}
