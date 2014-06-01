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
     * The NotationParser instance.
     *
     * @var NotationParser
     */
    protected $notation;

    /**
     * The constructor.
     *
     * @param Fuzzy $fuzzy
     * @param NotationParser $notation
     * @return Finder
     */
    public function __construct(Fuzzy $fuzzy, NotationParser $notation)
    {
        $this->fuzzy    = $fuzzy;
        $this->notation = $notation;
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
