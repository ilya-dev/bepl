<?php namespace Spec\Bepl;

use PhpSpec\ObjectBehavior;

class DumperSpec extends ObjectBehavior {

    function it_is_initializable()
    {
        $this->shouldHaveType('Bepl\Dumper');
    }

    function it_dumps_a_string()
    {
        $this->dump('foo')->shouldReturn('"foo"');
    }

    function it_dumps_an_integer()
    {
        $this->dump(256)->shouldReturn('256');
    }

    function it_dumps_a_float()
    {
        $this->dump(32.256)->shouldReturn('32.256');
    }

    function it_dumps_a_boolean()
    {
        $this->dump(false)->shouldReturn('false');

        $this->dump(true)->shouldReturn('true');
    }

    function it_dumps_a_null()
    {
        $this->dump(null)->shouldReturn('null');
    }

    function it_dumps_an_object()
    {
        $this->dump(new \stdClass)->shouldMatch('<stdClass:#(\w+)>');
    }

    function it_dumps_an_array()
    {
        $result = "[\n  \"foo\" => false,\n  \"bar\" => 42,\n  \"baz\" => \"wow\"\n]\n";

        $this->dump(['foo' => false, 'bar' => 42, 'baz' => 'wow'])
             ->shouldReturn($result);
    }

}
