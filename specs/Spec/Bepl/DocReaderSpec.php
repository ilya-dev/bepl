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
        $notation->parse('trim')->willReturn([
            'on'   => null,
            'name' => 'trim',
            'type' => 'function'
        ]);

        $block->reflector(Argument::type('ReflectionFunction'))
              ->willReturn('baz');

        $this->read('trim')->shouldReturn('baz');
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

    function it_reads_documentation_3(Block $block, NotationParser $notation)
    {
        $notation->parse('Bepl\Testing\Foo::$wow')->willReturn([
            'on'   => 'Bepl\Testing\Foo',
            'name' => 'wow',
            'type' => 'property'
        ]);

        $block->setObject(Argument::type('Bepl\Testing\Foo'))->shouldBeCalled();
        $block->property('wow')->willReturn('baz');

        $this->read('Bepl\Testing\Foo::$wow')->shouldReturn('baz');
    }

}

namespace Bepl\Testing;

class Foo {

    /**
     * baz
     */
    public $wow;

    /**
     * baz
     */
    public function bar() {}

}
