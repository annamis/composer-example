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
        
        preg_match_all('/<' . $tag . '.*?>(.*?)<\/' . $tag . '>/s', $page, $match); 
        if (empty($match)) {
            return 'Тeг не найден'; 
        } else {
            return $match[0]; 
        }
    }
}
