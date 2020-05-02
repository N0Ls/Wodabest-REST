<?php

namespace App\Http\Controllers\Actions;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class ImageAction extends Controller
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
     * Display the images view.
     *
     * @return \Illuminate\Http\Response
     */
    public function showAll()
    {
        return view('pages.images.showAll');
    }

    /**
     * Display the ranked images view.
     *
     * @return \Illuminate\Http\Response
     */
    public function showRanked()
    {
        return view('pages.images.ranking');
    }

    /**
     * Display the user images view.
     *
     * @return \Illuminate\Http\Response
     */
    public function user()
    {
        return view('pages.images.user');
    }

    /**
     * Display the one image view.
     *
     * @return \Illuminate\Http\Response
     */
    public function show()
    {
        return view('pages.images.show');
    }

    /**
     * Display the edit image view.
     *
     * @return \Illuminate\Http\Response
     */
    public function edit()
    {
        return view('pages.images.edit');
    }

    /**
     * Display the upload image view.
     *
     * @return \Illuminate\Http\Response
     */
    public function upload()
    {
        return view('pages.images.upload');
    }
}
