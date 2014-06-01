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

        $this->registerCompletionHandler();
    }

    /**
     * Listen to the user's input.
     *
     * @return void
     */
    public function listen()
    {
        $this->manager->load();

        do
        {
            $input = $this->readLine();

            if ( ! is_null($input))
            {
                $result = $this->evaluator->evaluate($input);

                $this->displayResult($result);

                if ( ! $this->forget)
                {
                    $this->manager->add($input);
                }
            }
        }
        while ($input != 'exit');

        $this->manager->save();
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

    /**
     * Display a result.
     *
     * @param mixed $result
     * @return void
     */
    protected function displayResult($result)
    {
        echo $result ? ($result.PHP_EOL) : null;
    }

    /**
     * Set what will be fired when the user hits Tab.
     *
     * @return void
     */
    protected function registerCompletionHandler()
    {
        readline_completion_function(function($input)
        {
            return [$input, 'bar'];
        });
    }

}
