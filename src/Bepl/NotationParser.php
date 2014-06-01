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
            return ['name' => $notation];
        }

        list($on, $name) = explode('::', $notation);

        return compact('on', 'name');
    }

}
