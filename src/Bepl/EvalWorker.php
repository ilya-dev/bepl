<?php namespace Bepl;

class EvalWorker {

    /**
     * The Dumper instance.
     *
     * @var Dumper
     */
    protected $dumper;

    /**
     * The constructor.
     *
     * @param Dumper $dumper
     * @return EvalWorker
     */
    public function __construct(Dumper $dumper)
    {
        $this->dumper = $dumper;
    }

    /**
     * Evaluate a given code.
     *
     * @param string $code
     * @return mixed
     */
    public function evaluate($code)
    {
        $result = eval ("return {$code};");

        return sprintf('# => %s', $this->dumper->dump($result));
    }

}
