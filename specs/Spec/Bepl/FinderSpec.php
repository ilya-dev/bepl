<?php namespace Spec\Bepl;

use PhpSpec\ObjectBehavior, Prophecy\Argument;
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

    function it_returns_an_array_of_matches(Fuzzy $fuzzy)
    {
        $fuzzy->search(Argument::type('array'), 'foo', Argument::type('integer'))
              ->willReturn(['foobar', 'foobaz']);

        $this->find('foo')->shouldReturn(['foobar', 'foobaz']);
    }

}
