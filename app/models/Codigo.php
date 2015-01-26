<?php
class Codigo extends Eloquent
{
    public function generar($id)
    {
        $chars = "0123456789abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ";
        $code = $id;

        for ($x=0; $x <= 10; $x++) {
            $rand = rand(1, strlen($chars));
            $code .= substr($chars, $rand, 1);

            if(strlen($code) == 8)
                break;
        }
        return $code;
    }
}