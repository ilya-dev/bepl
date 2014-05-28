<?php namespace Bepl;

class InputListener {

    /**
     * The HistoryManager instance.
     *
     * @var HistoryManager
     */
    protected $manager;

    /**
     * The EvalWorker instance.
     *
     * @var EvalWorker
     */
    protected $evaluator;

    /**
     * The constructor.
     *
     * @param HistoryManager $manager
     * @param EvalWorker $evaluator
     * @return InputListener
     */
    public function __construct(HistoryManager $manager, EvalWorker $evaluator)
    {
        $this->manager = $manager;

        $this->evaluator = $evaluator;
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

            $result = $this->evaluator->evaluate($input);

            echo $result ? $result.PHP_EOL : null;

            $manager->add($input);
        }
        while ($input != 'exit');

        $manager->save();
    }

}
