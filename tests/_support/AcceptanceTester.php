<?php


/**
 * Inherited Methods
 * @method void wantToTest($text)
 * @method void wantTo($text)
 * @method void execute($callable)
 * @method void expectTo($prediction)
 * @method void expect($prediction)
 * @method void amGoingTo($argumentation)
 * @method void am($role)
 * @method void lookForwardTo($achieveValue)
 * @method void comment($description)
 * @method \Codeception\Lib\Friend haveFriend($name, $actorClass = NULL)
 *
 * @SuppressWarnings(PHPMD)
*/
class AcceptanceTester extends \Codeception\Actor
{
    use _generated\AcceptanceTesterActions {
        amOnPage as traitAmOnPage;
        sendRequest as traitSendRequest;
    }

    public function dontSeeErrors()
    {
        $this->dontSee('Notice');
        $this->dontSee('Warning');
        $this->dontSee('error');
        $this->dontSee('Exception');
    }

    public function amOnPage($url)
    {
        $this->setHeader('X_REQUESTED_WITH', 'Codeception');
        $result = $this->traitAmOnPage($url);
        $this->dontSeeErrors();

        return $result;
    }

    public function sendRequest($method, $uri, $params = null)
    {
        $this->setHeader('X_REQUESTED_WITH', 'Codeception');
        $result = $this->traitSendRequest($method, $uri, $params);

        return $result;
    }
}
