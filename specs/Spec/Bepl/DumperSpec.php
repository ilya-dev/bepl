<?php namespace Spec\Bepl;

use PhpSpec\ObjectBehavior;

class DumperSpec extends ObjectBehavior {

    function it_is_initializable()
    {
        $this->shouldHaveType('Bepl\Dumper');
    }

    function it_dumps_a_string()
    {
        $this->dump('foo')->shouldReturn('foo');
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

}
