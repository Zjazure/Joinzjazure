<?php
class config
{
    public static function get_configs()
    {
        if(file_exists(dirname(__DIR__)."/config.json")){ 
            $content = file_get_contents(dirname(__DIR__)."/config.json"); 
            $json = json_decode($content,true); 
        }
        return $json;
    }
}