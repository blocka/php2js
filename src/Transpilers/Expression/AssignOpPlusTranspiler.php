<?php
namespace Php2js\Transpilers\Expression;

use Php2js\NodeDispatcher;
use Php2js\Transpilers\AbstractTranspiler;

class AssignOpPlusTranspiler extends AbstractTranspiler
{
    /**
     * @return string
     */
    public function transpile()
    {
        $varDispatcher = new NodeDispatcher($this->node->var);
        $varDispatcher->setContext($this);
        $variable = $varDispatcher->dispatch();

        $exprDispatcher = new NodeDispatcher($this->node->expr);
        $exprDispatcher->setContext($this);
        $expression = $exprDispatcher->dispatch();

        return "$variable += $expression;";
    }
}
