<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class HomeController extends Controller
{
public function index()
    {
        $lang = app()->getLocale();
        return view('home', compact('lang'));
    }

public function switchLanguage($lang)
{
    if (array_key_exists($lang, config('app.languages'))) {
        app()->setLocale($lang);
        session()->put('locale', $lang);
    }
    return redirect()->back();
}













}
