<?php namespace Spec\Bepl;

use PhpSpec\ObjectBehavior;
use Bepl\HistoryManager;

class InputListenerSpec extends ObjectBehavior {

    function let(HistoryManager $manager)
    {
        $this->beConstructedWith($manager);
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
        $manager->add('exit')->shouldBeCalled();

        $this->listen();
    }

}

namespace Bepl;

function readline($prompt)
{
    static $input = ['foo', 'exit'];

    return array_shift($input);
}

