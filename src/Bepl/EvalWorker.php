<?php namespace Bepl;

class EvalWorker {

    /**
     * Evaluate a given code.
     *
     * @param string $code
     * @return mixed
     */
    public function evaluate($code)
    {
        return eval ("return {$code};");
    }

}
