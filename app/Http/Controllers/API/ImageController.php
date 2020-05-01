<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

use App\Image as Image;
use App\Category as Category;

class ImageController extends Controller
{
    /**
     * Get all images.
     *
     * @return \Illuminate\Http\Response
     */
    public function showAll()
    {
        $images = Image::orderBy('wins', 'desc')->get();
        $data = [
            'images' => $images,
        ];
        return response()->json(['data' => $data]);
    }

    /**
     * Get top images.
     *
     * @return \Illuminate\Http\Response
     */
    public function showRanked()
    {
        $limit = 12;

        $images = Image::orderBy('rank', 'desc')->take($limit)->get();
        $data = [
            'images' => $images,
        ];
        return response()->json(['data' => $data]);
    }

    /**
     * Get auth user images.
     *
     * @return \Illuminate\Http\Response
     */
    public function showUser()
    {
        $images = Image::where('user_id', 3)->get();

        $data = [
            'images' => $images
        ];

        return response()->json(['data' => $data]);
    }

        /**
     * Get auth user images.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $image = Image::find($id);

        $data = [
            'image' => $image
        ];

        return response()->json(['data' => $data]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $image = Image::find($id);

        $data = [
            'image' => $image
        ];

        return response()->json(['data' => $data]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request)
    {
        $image = Image::find($request->id);
        print_r($request);
        $image->title = $request->title;
        $image->description = $request->description;

        $image->save();

        return response()->json(['success' => true, 'message' => 'Projet mis à jour.']);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function upload()
    {
        $categories = Category::all();

        $data = [
            'categories' => $categories
        ];

        return response()->json(['data' => $data]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        print_r($request);
        $this->validate($request,[
          'title'=>'required|string|max:255',
          'description'=> 'required|string|max:4000',
          'category'=> 'required',
          'image'=>'required|image|mimes:jpeg,png,jpg,gif,svg|max:2048'
        ]);

        $newImage = new Image;

        $newImage->user_id = Auth::user()->id;
        $newImage->title = $request->title;
        $newImage->description = $request->description;
        $newImage->category_id = $request->category_id;

        $imageName = time();
        $imageExtension = '.'.$request->image->getClientOriginalExtension();
        $newImage->filename = $imageName.$imageExtension;

        request()->image->move('img/uploads', $imageName.$imageExtension);

        $newImage->save();

        return response()->json(['success' => true, 'message' => 'Projet mis à jour.']);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        /*$categories = Category::all();
        return view('pages.images.upload')->with('categories', $categories);*/
    }

    /**
     * Show the images related to the user.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function showUserImages(Request $request)
    {
        /*$limit = 16;
        $categories = Category::all();

        if(request()->category)
        {
            $images = Image::where('category_id', Category::where('slug', request('category'))->value('id'))
                ->where('user_id', Auth::user()->id)
                ->get();
        }
        else
        {
            $images = Image::where('user_id', Auth::user()->id)->paginate($limit);
        }

        $data = [
            'images' => $images,
            'categories' => $categories,
            'path' => $request->segment(2)
        ];

        return view('pages.images.user')->with($data);*/
    }

        /**
     * Show the images related to the user.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function showRankedImages(Request $request)
    {
        /*$limit = 12;
        $categories = Category::all();

        if(request()->category)
        {
            $images = Image::where('category_id', Category::where('slug', request('category'))->value('id'))->orderBy('rank', 'desc')->take($limit)->get();
        }
        else
        {
            $images = Image::orderBy('rank', 'desc')->take($limit)->get();
        }

        $data = [
            'images' => $images,
            'categories' => $categories,
            'limit' => $limit,
            'path' => $request->segment(2)
        ];

        return view('pages.images.ranking')->with($data);*/
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        /*$path = 'img/uploads/';
        $filename = Image::select('filename')->where('id', $id)->value('filename');
        $filepath = $path . $filename;

        $deleted = Image::destroy($id);

        if($deleted)
        {
            if(is_file($filepath))
                unlink($filepath);
            Session::flash('success', 'Le projet a bien été supprimé.');
        }
        else
            Session::flash('error', 'Une erreur est survenue et le projet n\'a pas pu être supprimé.');
        return redirect()->back();*/
    }
}
