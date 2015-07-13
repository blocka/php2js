<?php
namespace Php2js\Transpilers\Expression\Operators\Arithmetic;

use Php2js\NodeDispatcher;
use Php2js\Transpilers\AbstractTranspiler;
use PhpParser\Node;

class PostIncTranspiler extends AbstractTranspiler
{
    public function transpile()
    {
        $dispatcher = new NodeDispatcher($this->node->var);
        $dispatcher->setContext($this);

        return $dispatcher->dispatch().'++';
    }
}
