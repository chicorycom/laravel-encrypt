<?php

namespace Tests;

use Chicorycom\App\Encryption;
use Chicorycom\Facade\Encrypte;
use PHPUnit\Framework\TestCase;

class EncryptTest extends TestCase
{
    /**
     * A basic test example.
     *
     * @return void
     */
    public function testEncryp()
    {
        $encrypt = new Encryption();
        $decrypt = $encrypt->Crypte('test');
        $this->assertEquals('test' , $encrypt->Decrypte($decrypt));
    }

    public function testEncryptfacade()
    {
        $decrypt = Encrypte::Crypte('test');
        $this->assertEquals('test' , Encrypte::Decrypte($decrypt));
    }
}
