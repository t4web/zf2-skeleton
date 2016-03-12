<?php


namespace Users\User;

use Zend\View\Model\ViewModel;

class ListViewModel extends ViewModel
{
    public function getVariable($name, $default = null)
    {
        $variable = parent::getVariable($name, $default);

        if ($name == 'result') {
            if (! $variable instanceof \ArrayObject) {
                throw new \RuntimeException('Variable result must be instance of ' . \ArrayObject::class . '. '
                    . gettype($variable) . ' given');
            }
            $result = [];
            foreach ($variable as $entry) {
                if (! $entry instanceof User) {
                    throw new \RuntimeException('Variable result must be instance of ' . User::class . '. '
                        . gettype($entry) . ' given');
                }
                $result[] = $entry->extract();
            }

            return $result;
        }

        return $variable;
    }
}
