<?php

/**
 * Description of WrapHashLinks
 *
 * @author Алеша
 */
class WrapHashLinks {
    
    public static function getWrappedLinks($text){
        
        $pattern = '~(#[A-Za-z0-9]+)~';
        $replacement = '<a href="/search/$1">$1</a>';
        return preg_replace($pattern, $replacement, $text);
        
    }
}
