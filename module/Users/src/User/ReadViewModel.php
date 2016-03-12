<?php


namespace Users\User;

use Zend\View\Model\ViewModel;

class ReadViewModel extends ViewModel
{
    public function getVariable($name, $default = null)
    {
        $variable = parent::getVariable($name, $default);

        if ($name == 'result') {
            if (! $variable instanceof User) {
                throw new \RuntimeException('Variable result must be instance of ' . User::class . '. '
                    . gettype($variable) . ' given');
            }
            $variable = $variable->extract();
        }

        return $variable;
    }
}
