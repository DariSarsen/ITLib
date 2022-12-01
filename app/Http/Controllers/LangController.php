<?php


namespace App\Http\Controllers;


use Illuminate\Http\Request;

use Illuminate\Support\Facades\App;


class LangController extends Controller

{

    public function change(Request $request, $lang)
    {
        $request->session()->put('mylocale', $lang);
        return redirect()->back();

    }

}
