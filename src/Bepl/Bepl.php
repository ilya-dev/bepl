<?php namespace Bepl;

use Little;

class Bepl extends Little {

    /**
     * Resolve all type hinted dependencies and create an instance.
     *
     * @param string $class
     * @return mixed
     */
    public static function create($class)
    {
        return (new static)->make($class);
    }

}
