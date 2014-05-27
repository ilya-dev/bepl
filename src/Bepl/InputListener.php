<?php namespace Bepl;

class InputListener {

    /**
     * The HistoryManager instance.
     *
     * @var HistoryManager
     */
    protected $manager;

    /**
     * The constructor.
     *
     * @param HistoryManager $manager
     * @return InputListener
     */
    public function __construct(HistoryManager $manager)
    {
        $this->manager = $manager;
    }

    /**
     * Listen to the user's input.
     *
     * @return void
     */
    public function listen()
    {
        $manager = $this->manager;

        $manager->load();

        do
        {
            $input = readline('>>> ');

            $manager->add($input);
        }
        while ($input != 'exit');

        $manager->save();
    }

}
