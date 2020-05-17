<?php

namespace App\Http\Controllers;

use App\Like as Like;
use App\User as User;
use Illuminate\Http\Request;

class LikeController extends Controller
{
    /**
     * Display a listing of the resources.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        try
        {
            $likes = Like::all();
        
            return response()->json($likes);
        }
        catch(\Exception $e)
        {
            echo $e->getMessage();
        }
    }

    /**
     * Create the specified resource in storage.
     *
     * @param \Illuminate\Http\Request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        try
        {
            $like = new Like;

            $like->user_id = $request->ids["user"];
            $like->project_id = $request->ids["project"];

            $like->save();

            return response()->json($like, 201);
        }
        catch(\Exception $e)
        {
            echo $e->getMessage();
        }
    }


    /**
     * Delete the specified resource in storage.
     *
     * @param App\Like $like
     * @return \Illuminate\Http\Response
     */
    public function destroy(Like $like)
    {
        try
        {
            $like->delete();

            return response()->json('Deleted like.', 200);
        }
        catch(\Exception $e)
        {
            echo $e->getMessage();
        }
    }
}
