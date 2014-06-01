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
     * Find matching identificators (approximate searching).
     *
     * @param string $notation
     * @return array
     */
    public function find($notation)
    {
        $notation = $this->notation->parse($notation);

        list($internal, $user) = array_values(get_defined_functions());

        $identificators = array_merge($internal, $user);

        return $this->fuzzy->search($identificators, $notation['name'], 5);
    }

}
