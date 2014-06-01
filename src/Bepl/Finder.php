<?php namespace Bepl;

use Fuzzy\Fuzzy;

class Finder {

    /**
     * The Fuzzy instance.
     *
     * @var Fuzzy
     */
    protected $fuzzy;

    /**
     * The constructor.
     *
     * @param Fuzzy $fuzzy
     * @return Finder
     */
    public function __construct(Fuzzy $fuzzy)
    {
        $this->fuzzy = $fuzzy;
    }

}
