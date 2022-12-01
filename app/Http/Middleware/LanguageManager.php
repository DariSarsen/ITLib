<?php


namespace App\Http\Middleware;


use Closure;

use Illuminate\Support\Facades\App;


class LanguageManager

{
    public function handle($request, Closure $next)

    {

        if (session()->has('mylocale') and array_key_exists(session()->get('mylocale'), config('app.languages'))) {
            App::setLocale(session()->get('mylocale'));
        } else {
            App::setLocale(session()->get('locale'));
        }


        return $next($request);

    }

}
