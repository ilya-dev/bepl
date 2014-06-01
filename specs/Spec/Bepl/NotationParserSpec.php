<?php namespace Spec\Bepl;

use PhpSpec\ObjectBehavior;

class NotationParserSpec extends ObjectBehavior {

    function it_is_initializable()
    {
        $this->shouldHaveType('Bepl\NotationParser');
    }

    function it_parses_a_notation_into_an_array()
    {
        $this->parse('some_function')->shouldReturn([
            'on'   => null,
            'name' => 'some_function',
            'type' => 'function'
        ]);

        $this->parse('Foo\BarBaz::wow_such')->shouldReturn([
            'on'   => 'Foo\BarBaz',
            'name' => 'wow_such',
            'type' => 'method'
        ]);

        $this->parse('FooBar::$wow')->shouldReturn([
            'on'   => 'FooBar',
            'name' => 'wow',
            'type' => 'property'
        ]);
    }

}
