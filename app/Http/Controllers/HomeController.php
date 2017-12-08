<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use Auth;
use App\User;
use App\History;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('home');
    }
    public function showuser()
    {
        $user = Auth::user();
        $history = $user->history()->orderBy('date','desc')->get();
        return view('user.show', compact('user','history'));
    }

    public function updateuser(Request $request)
    {

        $user = Auth::user();
        $user->email = $request->email;
        $user->save();
        return view('user.show', compact('user'));
    }
}
