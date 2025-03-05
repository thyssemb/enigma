<?php

use PHPUnit\Framework\TestCase;
use App\Chiffrement\Cesar;

class CesarTest extends TestCase
{
    public function testReturnChar()
    {
        $cesar = new Cesar();

        $result = $cesar->returnChar();

        $this->assertEquals('hello', $result);
    }

    public function testChiffrement()
    {
        $cesar = new Cesar();

        $cesar->returnChar();
        $result = $cesar->chiffrement();

        echo "Résultat du chiffrement : " . $result . PHP_EOL;

        $this->assertEquals('lipps', $result);
    }
}
