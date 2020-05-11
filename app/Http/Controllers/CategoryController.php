<?php

namespace App\Http\Controllers;

use App\Category as Category;
use Illuminate\Http\Request;

class CategoryController extends Controller
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
            $categories = Category::all();
        
            return response()->json($categories);
        }
        catch(\Exception $e)
        {
            echo $e->getMessage();
        }
    }
}
