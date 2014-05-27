<?php namespace Bepl;

use Bepl\Exceptions\HistoryManagerException;

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
        readline_add_history($line);
    }

    /**
     * Load the history from a file.
     *
     * @return void
     */
    public function load()
    {
        $loaded = readline_read_history($this->file);

        if ( ! $loaded)
        {
            throw new HistoryManagerException("Unable to load the history from {$this->file}.");
        }
    }

    /**
     * Write the history to a file.
     *
     * @return void
     */
    public function save()
    {
        $saved = readline_write_history($this->file);

        if ( ! $saved)
        {
            throw new HistoryManagerException("Unable to save the history to {$this->file}.");
        }
    }

}

