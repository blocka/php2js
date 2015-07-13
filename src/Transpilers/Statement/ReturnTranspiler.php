<?php
namespace Php2js\Transpilers\Statement;

use Php2js\Transpilers\AbstractTranspiler;
use Php2js\NodeDispatcher;

class ReturnTranspiler extends AbstractTranspiler
{
    /**
     * @return string
     */
    public function transpile()
    {
        $dispatcher = new NodeDispatcher($this->node->expr);
        $dispatcher->setContext($this);
        $expression = $dispatcher->dispatch();

        return 'return '. $expression .';';
    }
}
