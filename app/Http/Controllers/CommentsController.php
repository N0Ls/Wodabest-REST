<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Comment as Comment;
use Auth;
use Illuminate\Support\Facades\Session;

class CommentsController extends Controller
{
 
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request, $image_id)
    {
        $this->validate($request, array(
            'content' => 'required|min:5|max:2000'
        ));

        $comment = new Comment;

        $comment->user_id = Auth::user()->id;
        $comment->image_id = $image_id;
        $comment->content = $request->content;

        $comment->save();

        Session::flash('success', 'Commentaire créé avec succès.');

        return redirect()->back();
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
