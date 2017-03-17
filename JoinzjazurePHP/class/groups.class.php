<?php
class group
{
    public $id;
    public $name;
    public $value;
    public $description;
    
    public static function get_groups()
    {
        return json_decode(file_get_contents(dirname(__DIR__)."\JsonData\Groups.json"));
    }
}
