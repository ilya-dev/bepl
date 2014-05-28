<?php namespace Bepl;

class Dumper {

    /**
     * Dump a given value.
     *
     * @param mixed $value
     * @return string
     */
    public function dump($value)
    {
        switch (gettype($value))
        {
            case 'string': return "\"{$value}\"";
            case 'integer': return strval($value);
            case 'double': return strval($value);
            case 'boolean': return $value ? 'true' : 'false';
            case 'NULL': return 'null';

            default: die(gettype($value));
        }
    }

}
