<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class StaticSitesController extends Controller
{
    //
    public function faq()
    {
        return view('faq');
    }
    public function impressum()
    {
        return view('impressum');
    }
}
