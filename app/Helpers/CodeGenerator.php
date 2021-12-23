<?php

namespace App\Helpers;

class CodeGenerator
{
    protected $chars = '0123456789abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ';

    public function getCode(int $key): string
    {
        $base62Num = $this->getBase62($this->getRandomNum($key));
        $randomChar = $this->chars[rand(0, 61)];

        return $randomChar . $base62Num;
    }

    private function getRandomNum(int $key): int
    {
        list($ms, $segs) = explode(' ', microtime());
        $segs = $segs - 1608000000;
        $ms = round($ms * 1000);
        $ms = $ms < 100 ? $ms * 10 : $ms;
        $num = (int) $segs . $ms;

        return $num + $key;

    }

    private function getBase62(int $num): string
    {
        $status = true;
        $base62Num = '';

        do {
            if($num > 62) {
                $odd = $num % 62;
                $num = intdiv($num, 62);
                $base62Num .= $this->chars[$odd];
            } else {
                $base62Num .= $this->chars[$num];
                $status = false;
            }
        } while ($status);

        return strrev($base62Num);
    }
}
