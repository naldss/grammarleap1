<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\PosHunterSentence;
use Auth;

class PosHunterController extends Controller
{
    public function show(){
        if(Auth::check()) {
            $user = Auth::user();
            $name = "{$user->fname} {$user->lname}";

            $sentences = PosHunterSentence::query()->inRandomOrder()->limit(5)->get();

            return view('games.pos-hunter', compact( 'sentences', 'name'));
        } else {
            return redirect()->route('home');
        }
    }
}
