<?php

namespace Petlost\UsuarioBundle\Lib\Doctrine\Functions;

use Doctrine\ORM\Query\AST\Functions\FunctionNode;
use Doctrine\ORM\Query\Lexer;


/**
*
* @author Julien Fastré <julien arobase fastre point info>
*/
class Geomfromtext extends FunctionNode {

    
    private $point = null;
    
    public function getSql(\Doctrine\ORM\Query\SqlWalker $sqlWalker) {
        return 'ST_GeomFromText('.$this->point->dispatch($sqlWalker).')';
    }

    public function parse(\Doctrine\ORM\Query\Parser $parser) {

        $parser->match(Lexer::T_IDENTIFIER);
        $parser->match(Lexer::T_OPEN_PARENTHESIS);
        
        $this->point = $parser->StringPrimary();

        $parser->match(Lexer::T_CLOSE_PARENTHESIS);

    }
}