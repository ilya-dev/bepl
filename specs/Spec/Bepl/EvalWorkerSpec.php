<?php namespace Spec\Bepl;

use PhpSpec\ObjectBehavior;
use Bepl\Dumper;

class EvalWorkerSpec extends ObjectBehavior {

    function let(Dumper $dumper)
    {
        $this->beConstructedWith($dumper);
    }

    function it_is_initializable()
    {
        $this->shouldHaveType('Bepl\EvalWorker');
    }

    function it_evaluates_the_given_code(Dumper $dumper)
    {
        $dumper->dump(32)->willReturn('32');

        $this->evaluate('pow(2, 5)')->shouldReturn('# => 32');
    }

}
