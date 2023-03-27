<?php
namespace App\Actions\Locale;

use App\Tasks\Locale\SetLocaleTask;

class SetLocaleAction
{

    public function run($locale){
        return app(SetLocaleTask::class)->run($locale);
    }
}