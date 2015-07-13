<?php
namespace Php2js\Transpilers\Expression;

use Php2js\Transpilers\AbstractTranspiler;
use Php2js\NodeDispatcher;

class ArrayDimFetchTranspiler extends AbstractTranspiler
{
    /**
     * @return string
     */
    public function transpile()
    {
        $varDispatcher = new NodeDispatcher($this->node->var);
        $varDispatcher->setContext($this);

        $dimDispatcher = new NodeDispatcher($this->node->dim);
        $dimDispatcher->setContext($this);

        return $varDispatcher->dispatch().'['.$dimDispatcher->dispatch().']';
    }
}
