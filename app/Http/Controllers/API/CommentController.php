<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

use App\Comment as Comment;

class CommentController extends Controller
{
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

        /*!! return json : message success !!*/
    }
}
