<?php

namespace anna_mi\parser;
/**
 * Description of Parser
 * @author Anna Mishchanchuk <annamishchanchuk@gmail.com>
 */
class Parser implements ParserInterface
{
    
   /** 
    * @param string $url
    * @param string $tag
    * @return array
    */
    public function process(string $url, string $tag):array 
        {
        $page = file_get_contents($url);

        if ($page === false) {
        	return 'Неверный адрес страницы';
        }
        
        preg_match_all("~<$tag>(.*)<\/$tag>~", $page, $match); 
        if (!$match) {
            return 'Тэг не найден'; 
        } else {
            return $match[0]; 
        }
    }
}

$parse1 = new Parser();
print_r($parse1->process('http://listen-radio.org/news/', 'h3'));
