<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class LanguageController extends Controller
{
    public function locale($locale) {
        if(array_key_exists($locale, config('app.supported_locale'))) {
            session()->put('locale', $locale);
        }

        return redirect()->back();
    }
}
