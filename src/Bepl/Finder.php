<?php namespace Bepl;

use Fuzzy\Fuzzy;
use ReflectionClass, ReflectionMethod;

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

        if ($notation['type'] == 'function')
        {
            list($internal, $user) = array_values(get_defined_functions());
            $ids = array_merge($internal, $user, get_declared_classes());

            return $this->fuzzy->search($ids, $notation['name'], 7);
        }

        $transformer = function(ReflectionMethod $method)
        {
            return $method->getName();
        };

        $ids = (new ReflectionClass($notation['on']))->getMethods();

        $result = $this->fuzzy->search(
            array_map($transformer, $ids), $notation['name'], 7
        );

        foreach ($result as $key => $value)
        {
            $result[$key] = $notation['on'].'::'.$value;
        }

        return $result;
    }

}
