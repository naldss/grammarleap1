<?php

namespace App\Http\Controllers;

use Auth;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    public function home(Request $request) {
        if (Auth::check()){
            $user = Auth::user();
            $name = "{$user->fname} {$user->lname}";

            return view('pages.home', compact('name'));
        }else {
            return redirect()->route('login');
        }
    }
}
