<?php

namespace App\Http\Controllers\Actions;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class GameAction extends Controller
{
    /**
     * Create a new action/controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }
    
    /**
     * Display the game view.
     *
     * @return \Illuminate\Http\Response
     */
    public function game()
    {
        return view('pages.game.game');
    }
}
