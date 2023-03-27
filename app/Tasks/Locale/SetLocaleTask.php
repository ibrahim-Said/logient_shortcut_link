<?php

namespace App\Tasks\Locale;

class SetLocaleTask
{
    public function run($locale)
    {
        request()->session()->put('locale',$locale);
        return true;
    }
}
