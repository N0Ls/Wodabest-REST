<?php

namespace App\Http\Controllers;

use App\Image as Image;
use App\Category as Category;
use Illuminate\Http\Request;

class ImageController extends Controller
{
    /**
     * Display a listing of the resources.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        try
        {
            $images = Image::orderBY('created_at', 'desc')->get();
        
            return response()->json($images);
        }
        catch(\Exception $e)
        {
            echo $e->getMessage();
        }
    }

    /**
     * Display a listing of the resources.
     *
     * @param \Illuminate\Http\Request
     * @return \Illuminate\Http\Response
     */
    public function getproject(Request $request)
    {
        try
        {
            $image = Image::find($request->id);
        
            return response()->json($image);
        }
        catch(\Exception $e)
        {
            echo $e->getMessage();
        }
    }

    /**
     * 
     */
    public function getRankedProjects(Request $request)
    {
        try
        {
            $limit = 12;
            $categories = Category::all();
    
            if($request->category && $request->category !== "all")
            {
                $images = Image::where('category_id', Category::where('slug', request('category'))->value('id'))->orderBy('score', 'desc')->take($limit)->get();
            }
            else
            {
                $images = Image::orderBy('score', 'desc')->take($limit)->get();
            }
            return response()->json($images);
        }
        catch(\Exception $e)
        {
            echo $e->getMessage();
        }
    }

    /**
     * Update the specified resource in storage.
     *
     * @param \Illuminate\Http\Request
     * @param App\Image $project
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Image $project)
    {
        try
        {
            $data = $request->validate([
                'title' => 'string',
                'description' => 'string'
            ]);

            $project->update($data);

            return response()->json($project, 200);
        }
        catch(\Exception $e)
        {
            echo $e->getMessage();
        }
    }

    /**
     * Delete the specified resource from storage.
     *
     * @param \Illuminate\Http\Request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        try
        {
            $exploded = explode(',', $request->image);

            $decoded = base64_decode($exploded[1]);

            if(str_contains($exploded[0], 'jpeg'))
            {
                $extension = 'jpg';
            }
            else
            {
                $extension = 'png';
            }

            $filename = str_random() . '.' .$extension;

            $path = 'img/upload/' .$filename;

            file_put_contents($path, $decoded);

            $data = $request->validate([
                'user_id' => 'int',
                'title' => 'string',
                'description' => 'string'
             ]);

            $project = new Image;

            $category_id =  Category::where('name', $request->category)->select('id')->first()['id'];

            $project->user_id = $request->user_id;
            $project->category_id = $category_id;
            $project->title = $request->title;
            $project->description = $request->description;
            $project->filename = $filename;

            $project->save();

            return response()->json($project, 201);
        }
        catch(\Exception $e)
        {
            echo $e->getMessage();
        }
    }

    /**
     * Delete the specified resource from storage.
     *
     * @param App\Image $project
     * @return \Illuminate\Http\Response
     */
    public function destroy(Image $project)
    {
        try 
        {
            $project->delete();

            return response()->json('Deleted project item.', 200);
        }
        catch(\Exception $e)
        {
            echo $e->getMessage();
        }
    }
}
