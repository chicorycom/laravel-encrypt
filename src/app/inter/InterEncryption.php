<?php
/**
 * Created by IntelliJ IDEA.
 * User: CHICORYCOM
 * Date: 12/11/2017
 * Time: 16:48
 */

namespace chicorycom\App\inter;


interface InterEncryption
{

    /**
     * @param string $Str
     * @param string $EnctyptageKey
     * @return string
     */
    public function GenerationCle(string $Str, string $EnctyptageKey): string ;


    /**
     * @param string $Str
     * @return string
     * return Cryptage
     */
    public function crypte(string $Str): string ;


    /**
     * @param string $Str
     * @return string
     * return Decryptage
     */
    public function decrypte(string $Str): string ;
}