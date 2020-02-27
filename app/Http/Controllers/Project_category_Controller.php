<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Project_category;
use Illuminate\Support\Facades\Auth;

class Project_category_Controller extends Controller
{
     public function __construct()
        {
            $this->middleware('auth');
        }
    public function view(){
        return view('admin.project_category');
    }
    public function save(Request $request){
        $request->validate([
            "name" => 'required' ,
        ]);
        $category= new Project_category;
        $category->name=request('name');
        $category->save();
    }
    public function list_view(){
        $category=Project_category::all();
        return $category;
    }
    public function list_delete($id){
        $category= Project_category::find($id);
        $category->delete();
    }
    public function update(Request $request){
        $request->validate([
            "name" => 'required' ,
        ]);
        $id=request('id');
        $category= Project_category::find($id);
        $category->name=request('name');
        $category->save();
    }
}
