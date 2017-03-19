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

    public static function set_config($config,$value)
    {
        $conf = self::get_configs();
        $conf[$config] = $value;
        file_put_contents(dirname(__DIR__)."/config.json",json_encode($conf,true));
    }
}