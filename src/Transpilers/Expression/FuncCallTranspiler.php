<?php
namespace Php2js\Transpilers\Expression;

use Php2js\Transpilers\AbstractTranspiler;
use Php2js\NodeDispatcher;

class FuncCallTranspiler extends AbstractTranspiler
{
    /**
     * @return string
     */
    public function transpile()
    {
        $functionName = $this->node->name->toString();
        $args = array();
        foreach($this->node->args as $arg) {
        	$dispatcher = new NodeDispatcher($arg->value);
        	$dispatcher->setContext($this);

        	$args[] = $dispatcher->dispatch();
        }

        if (isset($this->configuration->functions[$functionName])) {
            return $this->configuration->functions[$functionName]($args);
        }

        return $functionName.'('.(implode(',',$args)).')';
    }
}