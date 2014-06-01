<?php namespace Bepl;

class NotationParser {

    /**
     * Parse a given notation into an array.
     *
     * @param string $notation
     * @return array
     */
    public function parse($notation)
    {
        if (strpos($notation, '::') === false)
        {
            return ['on' => null, 'name' => $notation, 'type' => 'function'];
        }

        $type = 'method';

        list($on, $name) = explode('::', $notation);

        if (strpos($name, '$') === 0)
        {
            $type = 'property';

            $name = substr($name, 1);
        }

        return compact('on', 'name', 'type');
    }

}
