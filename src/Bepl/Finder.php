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

    /**
     * Find first 5 matches (approximate searching).
     *
     * @param string $notation
     * @return array
     */
    public function find($notation)
    {
        return $this->fuzzy->search(get_defined_functions(), $notation, 5);
    }

}
