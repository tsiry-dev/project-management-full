<?php

namespace App\Helper;

use Illuminate\Support\Str;

class StrHelper
{
    public static function slug(string $value): string
    {
        $slugify = Str::slug($value . '-'. Str::random(10) . time());
        return $slugify;
    }
}
