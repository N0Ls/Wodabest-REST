<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Image as Image;
use App\Game as Game;
use App\Category as Category;
use Illuminate\Support\Facades\DB as DB;

class GameController extends Controller
{
    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function init(Request $request)
    {
        $limit = 2;
        $images = Image::all()->random($limit);

        $data = [
            'images' => $images,
        ];

        return response()->json(['images' => $images]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request)
    {
        $winner = Image::where('id', '=', $request->winner_id)->first();
        $loser = Image::where('id', '=', $request->loser_id)->first();
        $category = $request->category;

        $wins = $winner->wins + 1;

        $winner_expected_score = Game::expected($loser->score, $winner->score);
        $winner_new_score = Game::win($winner->score, $winner_expected_score);

        $winner_rank = Game::rank($winner_new_score, $wins, $winner->wins);

        $winner->update([
            'score' => $winner_new_score,
            'wins' => $wins,
            'rank' => $winner_rank,
        ]);

        $losses = $loser->losses + 1;

        $loser_expected_score = Game::expected($winner->score, $loser->score);
        $loser_new_score = Game::win($loser->score, $loser_expected_score);

        $loser_rank = Game::rank($loser_new_score, $losses, $loser->wins);

        $loser->update([
            'score' => $loser_new_score,
            'losses' => $losses,
            'rank' => $loser_rank,
        ]);

        Game::create([
            'winner' => $request->winner_id,
            'loser' => $request->loser_id
        ]);

        $limit = 2;

        if($request->category != null)
        {
            $images = Image::where('category_id', Category::where('slug', $request->category)->value('id'))
                ->orderBy(DB::raw('RAND()'))
                ->take($limit)
                ->get();
        }
        else
        {
            $images = Image::orderby(DB::raw('RAND()'))->take($limit)->get();
        }

        return response()->json(['images' => $images]);
    }
}
