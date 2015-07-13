<?php
namespace Php2js\Transpilers\Statement;

use Php2js\NodeDispatcher;
use Php2js\NodesDispatcher;
use Php2js\Transpilers\AbstractTranspiler;

class ForTranspiler extends AbstractTranspiler
{
    /**
     * @return string
     */
    public function transpile()
    {
        
        $init = $this->node->init;
        $cond = $this->node->cond;
        $loop = $this->node->loop;
        $body = $this->node->stmts;

        $parts = array('init','cond','loop','stmts');

        foreach ($parts as $part) {
            $node = $this->node->{$part};

            if (is_array($node)) {
                $dispatcher = new NodesDispatcher($node);
            }
            else {
                $dispatcher = new NodeDispatcher($node);
            }
            $dispatcher->setContext($this);
            
            $$part = $dispatcher->dispatch();
        }

        $result = 'for ('.implode('',$init).implode(';',$cond).';'.implode(';',$loop). ') {'.PHP_EOL.implode(PHP_EOL,$stmts).PHP_EOL.'}';
        return $result;
    }
}
