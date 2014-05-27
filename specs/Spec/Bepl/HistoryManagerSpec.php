<?php namespace Spec\Bepl;

use PhpSpec\ObjectBehavior;
use Prophecy\Argument;

class HistoryManagerSpec extends ObjectBehavior {

    function it_is_initializable()
    {
        $this->shouldHaveType('Bepl\HistoryManager');
    }

    function it_adds_a_line_to_the_history()
    {
        $this->add('foo');
    }

    function it_saves_the_history()
    {
        $this->save();
    }

    function it_loads_the_history()
    {
        $this->load();
    }

}

namespace Bepl;

function readline_add_history($line) {}
function readline_read_history($file) { return true; }
function readline_write_history($file) { return true; }

