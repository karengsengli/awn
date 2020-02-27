<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Blog_Post;
use App\Project;
use App\Project_category;

class Home_Controller extends Controller
{
    public function home(){
        $project_categorys=Project_category::all();
        $projects=Project::paginate(3);
        $posts = Blog_Post::orderBy('created_at', 'desc')->take(3)->get();
        return view("index", compact('posts','project_categorys','projects'));

    }
    public function home_paragraph(){
        $posts = Blog_Post::orderBy('created_at', 'desc')->take(3)->get();
        return $posts;

    }
    function fetch_data(Request $request)
    {
        $all=request("category");
        if ($all=='all') {
            if($request->ajax())
             {
              $projects = Project::paginate(3);
              return view('project_data', compact('projects'))->render();
             }
            # code...
        }
        else{
            if($request->ajax())
             {
              $projects = Project::where('project_category_id',request('category'))->paginate(3);
              return view('project_data', compact('projects'))->render();
             }

        }
     
    }
    
}
