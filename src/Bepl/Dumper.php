<?php namespace Bepl;

class Dumper {

    /**
     * Dump a given value.
     *
     * @param mixed $value
     * @return string
     */
    public function dump($value)
    {
        switch (gettype($value))
        {
            case 'string':
                return "\"{$value}\"";
            case 'boolean':
                return $value ? 'true' : 'false';
            case 'NULL':
                return 'null';
            case 'object':
                return sprintf('<%s:#%s>', get_class($value), spl_object_hash($value));
            case 'integer':
            case 'double':
                return strval($value);
            case 'array':
                foreach ($value as $key => $item)
                {
                    $value[$key] = $this->dump($key).' => '.$this->dump($item);
                }
                return sprintf("[\n  %s\n]\n", implode(",\n  ", $value));

            default: return '<unknown>';
        }
    }

}
