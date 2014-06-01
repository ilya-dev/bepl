<?php namespace Spec\Bepl;

use PhpSpec\ObjectBehavior;
use Fuzzy\Fuzzy;

class FinderSpec extends ObjectBehavior {

    function let(Fuzzy $fuzzy)
    {
        $this->beConstructedWith($fuzzy);
    }

    function it_is_initializable()
    {
        $this->shouldHaveType('Bepl\Finder');
    }

}
