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
            case 'string': return $value;
            case 'integer': return strval($value);
        }
    }

}
