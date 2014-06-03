<?php namespace Bepl;

use Block\Block;
use ReflectionFunction;

class DocReader {

    /**
     * The Block instance.
     *
     * @var Block
     */
    protected $block;

    /**
     * The NotationParser instance.
     *
     * @var NotationParser
     */
    protected $notation;

    /**
     * The constructor.
     *
     * @param Block $block
     * @param NotationParser $notation
     * @return DocReader
     */
    public function __construct(Block $block, NotationParser $notation)
    {
        $this->block    = $block;
        $this->notation = $notation;
    }

    /**
     * Read documentation for a given symbol.
     *
     * @param string $notation
     * @return string
     */
    public function read($notation)
    {
        $notation = $this->notation->parse($notation);

        switch ($notation['type'])
        {
            case 'method':
                $this->block->setObject(new $notation['on']);
                return (string) $this->block->method($notation['name']);

            case 'property':
                $this->block->setObject(new $notation['on']);
                return (string) $this->block->property($notation['name']);

            case 'function':
                return $this->block->reflector(new ReflectionFunction($notation['name']));
        }
    }

}
