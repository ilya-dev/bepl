<?php namespace Spec\Bepl;

use PhpSpec\ObjectBehavior;
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

    function it_reads_documentation()
    {
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
