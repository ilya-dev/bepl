<?php namespace Spec\Bepl;

use PhpSpec\ObjectBehavior, Prophecy\Argument;
use Block\Block, Bepl\NotationParser;

class DocReaderSpec extends ObjectBehavior {

    function let(Block $block, NotationParser $notation)
    {
        $this->beConstructedWith($block, $notation);
    }

    function it_is_initializable()
    {
        $this->shouldHaveType('Bepl\DocReader');
    }

    function it_reads_documentation_1(Block $block, NotationParser $notation)
    {
        $notation->parse('foo')->willReturn([
            'on'   => null,
            'name' => 'foo',
            'type' => 'function'
        ]);

        $block->reflector(Argument::type('ReflectionFunction'))
              ->willReturn('baz');

        $this->read('foo')->shouldReturn('baz');
    }

    function it_reads_documentation_2(Block $block, NotationParser $notation)
    {
        $notation->parse('Bepl\Testing\Foo::bar')->willReturn([
            'on'   => 'Bepl\Testing\Foo',
            'name' => 'bar',
            'type' => 'method'
        ]);

        $block->setObject(Argument::type('Bepl\Testing\Foo'))->shouldBeCalled();

        $block->method('bar')->willReturn('baz');

        $this->read('Bepl\Testing\Foo::bar')->shouldReturn('baz');
    }

}

namespace Bepl\Testing;

class Foo {

    /**
     * baz
     */
    public function bar() {}

}
