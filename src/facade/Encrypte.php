<?php
/**
 * Created by IntelliJ IDEA.
 * User: CHICORYCOM
 * Date: 12/11/2017
 * Time: 17:40
 */

namespace Chicorycom\Facade;


use Chicorycom\App\Encryption;

trait Encrypte
{

    /**
     * @param string $str
     * @return string
     */
    public static function Crypte(string $str): string {
        return (new encryption())->Crypte($str);
    }


    /**
     * @param string $str
     * @return string
     */
    public static function Decrypte(string $str): string {
        return (new encryption())->Decrypte($str);
    }
}