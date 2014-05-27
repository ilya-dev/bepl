<?php namespace Spec\Bepl;

use PhpSpec\ObjectBehavior;
use Prophecy\Argument;

class InputListenerSpec extends ObjectBehavior {

    function it_is_initializable()
    {
        $this->shouldHaveType('Bepl\InputListener');
    }

    function it_listens_to_the_users_input()
    {
        $this->listen();
    }

}
