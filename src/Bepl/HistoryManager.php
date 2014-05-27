<?php namespace Bepl;

class HistoryManager {

    /**
     * We store the history in that file.
     *
     * @var string
     */
    protected $file;

    /**
     * The constructor.
     *
     * @param string|null $file
     * @return HistoryManager
     */
    public function __construct($file = null)
    {
        $this->file = $file ?: getenv('HOME').'/.bepl_history';
    }

    /**
     * Add a line to the history.
     *
     * @param string $line
     * @return void
     */
    public function add($line)
    {

    }

    /**
     * Load the history from a file.
     *
     * @return void
     */
    public function load()
    {

    }

    /**
     * Write the history to a file.
     *
     * @return void
     */
    public function save()
    {

    }

}

