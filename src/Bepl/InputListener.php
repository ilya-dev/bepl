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
     * Whether to log your actions.
     *
     * @var boolean
     */
    protected $forget = false;

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
            $input = $this->readLine();

            if ( ! is_null($input))
            {
                $result = $this->evaluator->evaluate($input);

                echo $result ? $result.PHP_EOL : null;

                if ( ! $this->forget)
                {
                    $manager->add($input);
                }
            }
        }
        while ($input != 'exit');

        $manager->save();
    }

    /**
     * Read a line.
     *
     * @return string|null
     */
    protected function readLine()
    {
        $line = readline('>>> ');

        if (in_array($line, ['logging_on', 'logging_off']))
        {
            $this->forget = ($line == 'logging_off');

            return null;
        }

        return $line;
    }

}
