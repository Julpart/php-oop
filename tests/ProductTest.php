<?php

class ProductTest extends PHPUnit\Framework\TestCase
{
    public function testProductConstructor()
    {
        $name = [
            "Чай",
            "adsadsa",
            "1111dd",
            2312,
            "--++",
            0
        ];
        $description = [
            "Напиток",
            "adsadsa",
            "1111dd",
            2312,
            "--++",
            0
        ];
        $price = [
            100,
            000,
            "100",
            0b01101,
            11111111111111111111111111111111111,
            ""

        ];
        $likes = [
            100,
            000,
            "100",
            0b01101,
            11111111111111111111111111111111111,
            ""
        ];
        $path = [
            "./img.jpg",
            "./img.png",
            "./img",
            2312,
            "-121xaassd+",
            0
        ];
        for ($i = 0; $i <= 5; $i++) {
            $product = new \app\models\entities\Product($name[$i], $description[$i], $price[$i], $likes[$i], $path[$i]);
            $this->assertEquals($name[$i], $product->name);
            $this->assertEquals($description[$i], $product->description);
            $this->assertEquals($price[$i], $product->price);
            $this->assertEquals($likes[$i], $product->likes);
            $this->assertEquals($path[$i], $product->path);
        }
    }
}
