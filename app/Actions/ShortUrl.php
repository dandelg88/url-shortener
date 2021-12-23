<?php

namespace App\Actions;

use App\Helpers\CodeGenerator;
use App\Models\Url;

class ShortUrl
{
    public function short(Url $url): string
    {
        $code = new CodeGenerator();
        $url->code = $code->getCode($url->id);
        $url->save();

        return $url->code;
    }
}
