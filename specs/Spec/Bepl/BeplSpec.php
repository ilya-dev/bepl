<?php namespace Spec\Bepl;

use PhpSpec\ObjectBehavior;
use Prophecy\Argument;

class BeplSpec extends ObjectBehavior {

    function it_is_initializable()
    {
        $this->shouldHaveType('Bepl\Bepl');
    }

}
