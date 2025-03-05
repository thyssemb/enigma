<?php

use PHPUnit\Framework\TestCase;
use App\Chiffrement\Cesar;

class CesarTest extends TestCase
{
    public function testReturnChar()
    {
        $cesar = new Cesar();

        $cesar->text = 'salut';
        $cesar->key = 3;

        $result = $cesar->returnChar();

        $this->assertEquals('vdoxw', $result);
    }
}
