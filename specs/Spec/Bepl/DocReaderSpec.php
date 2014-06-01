<?php namespace Spec\Bepl;

use PhpSpec\ObjectBehavior;

class DocReaderSpec extends ObjectBehavior {

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
