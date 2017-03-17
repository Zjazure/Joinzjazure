<?php
class verification_code
{
    public $id;
    public $question;
    public $answer;

    public static function get_verification_codes()
    {
        return json_decode(file_get_contents(dirname(__DIR__)."\JsonData\VerificationCode.json"));    
    }

    public static function get_verification_code_by_id($id)
    {
        $codes = self::get_verification_codes();
        foreach ($codes as $code) {
            if($code->id==$id)
                return $code;
        }
        return null;
    }
}
