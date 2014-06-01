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
        return ['name' => $notation];
    }

}
