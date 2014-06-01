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

    function it_handles_complicated_identificators(Fuzzy $fuzzy, NotationParser $notation)
    {
        $notation->parse('ZipArchive::c')->willReturn([
            'on'   => 'ZipArchive',
            'name' => 'c',
            'type' => 'method'
        ]);

        $fuzzy->search(Argument::type('array'), 'c', Argument::type('integer'))
              ->willReturn(['close']);

        $this->find('ZipArchive::c')->shouldReturn(['close']);
    }

}
