<?php namespace Spec\Bepl;

use PhpSpec\ObjectBehavior;

class EvalWorkerSpec extends ObjectBehavior {

    function it_is_initializable()
    {
        $this->shouldHaveType('Bepl\EvalWorker');
    }

    function it_evaluates_the_given_code()
    {
        $this->evaluate('pow(2, 5)')->shouldReturn(32);
    }

}
