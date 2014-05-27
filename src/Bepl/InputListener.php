<?php namespace Bepl;

class InputListener {

    /**
     * Listen to the user's input.
     *
     * @return void
     */
    public function listen()
    {
        $input = null;

        while ($input !== 'exit')
        {
            $input = readline('>>> ');

            readline_add_history($input);
        }
    }

}
