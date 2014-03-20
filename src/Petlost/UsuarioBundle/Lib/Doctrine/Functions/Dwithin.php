<?php

namespace Petlost\UsuarioBundle\Lib\Doctrine\Functions;

use Doctrine\ORM\Query\AST\Functions\FunctionNode;
use Doctrine\ORM\Query\Lexer;


/**
*
* @author Julien Fastré <julien arobase fastre point info>
*/
class Dwithin extends FunctionNode {

    
    private $point = null;
    private $pointd = null;
    private $radio = null;


    public function getSql(\Doctrine\ORM\Query\SqlWalker $sqlWalker) {
        return 'ST_DWithin('.$this->point->dispatch($sqlWalker).', '.$this->pointd->dispatch($sqlWalker).' ,'.$this->radio->dispatch($sqlWalker).')';
    }

    public function parse(\Doctrine\ORM\Query\Parser $parser) {

        $parser->match(Lexer::T_IDENTIFIER);
        $parser->match(Lexer::T_OPEN_PARENTHESIS);

        $this->point = $parser->StringExpression();

        $parser->match(Lexer::T_COMMA);

        $this->pointd = $parser->StringExpression();
        
        $parser->match(Lexer::T_COMMA);
        
        $this->radio = $parser->StringPrimary();

        $parser->match(Lexer::T_CLOSE_PARENTHESIS);

    }
}