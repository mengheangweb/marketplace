<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App;

class SettingController extends Controller
{
    public function switchLang($code)
    {
        session()->put('locale', $code);


        return redirect()->back();
    }
}
