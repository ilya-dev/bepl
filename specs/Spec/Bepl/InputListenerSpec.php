<?php namespace Spec\Bepl;

use PhpSpec\ObjectBehavior;
use Bepl\HistoryManager, Bepl\EvalWorker;

class InputListenerSpec extends ObjectBehavior {

    function let(HistoryManager $manager, EvalWorker $evaluator)
    {
        $this->beConstructedWith($manager, $evaluator);
    }

    function it_is_initializable()
    {
        $this->shouldHaveType('Bepl\InputListener');
    }

    function it_listens_to_the_users_input(HistoryManager $manager)
    {
        $manager->load()->shouldBeCalled();
        $manager->save()->shouldBeCalled();

        $manager->add('foo')->shouldBeCalled();
        $manager->add('bar')->shouldNotBeCalled();
        $manager->add('baz')->shouldBeCalled();

        $this->listen();
    }

}

namespace Bepl;

function readline($prompt)
{
    static $input = ['foo', 'logging_off', 'bar', 'logging_on', 'baz'];

    return array_shift($input);
}

