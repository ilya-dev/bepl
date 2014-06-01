<?php namespace Spec\Bepl;

use PhpSpec\ObjectBehavior, Prophecy\Argument;
use Fuzzy\Fuzzy;
use Bepl\NotationParser;

class FinderSpec extends ObjectBehavior {

    function let(Fuzzy $fuzzy, NotationParser $notation)
    {
        $this->beConstructedWith($fuzzy, $notation);
    }

    function it_is_initializable()
    {
        $this->shouldHaveType('Bepl\Finder');
    }

    function it_returns_an_array_of_matches(Fuzzy $fuzzy, NotationParser $notation)
    {
        $notation->parse('tri')->willReturn([
            'on'   => null,
            'name' => 'tri',
            'type' => 'function'
        ]);

        $fuzzy->search(Argument::type('array'), 'tri', Argument::type('integer'))
              ->willReturn(['trim']);

        $this->find('tri')->shouldReturn(['trim']);
    }

}
