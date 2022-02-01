<?php

namespace App\Providers;

use Collective\Html\FormFacade AS Form;
use Illuminate\Support\ServiceProvider;

class AppServiceProvider extends ServiceProvider
{
    public function boot()
    {
        Form::macro('rating', function(string $label, int $userRanking = 0)
        {
            return '<div id="' . $label
                . '"></div><input type=hidden id="ratings-value" value="'
                . $userRanking . '" />';
        });
    }
}
