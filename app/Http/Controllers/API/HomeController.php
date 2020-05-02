<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;

use Illuminate\Http\Request;

use Auth as Auth;

use App\Game as Game;
use App\Image as Image;
use App\User as User;

class HomeController extends Controller
{
    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function init()
    {
        //$auth_user_name = Auth::user();
        $nb_images = count(Image::all());
        $nb_users = count(User::all());
        $nb_games = count(Game::all());

        $data = [
            'nb_images' => $nb_images,
            'nb_users' => $nb_users,
            'nb_games' => $nb_games
        ];

        return response()->json(['data' => $data]);
    }
}
