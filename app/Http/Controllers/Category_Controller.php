<?php

namespace App\Http\Controllers;
use App\Category;
use App\Blog_Post;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class Category_Controller extends Controller
{
    public function __construct()
        {
            $this->middleware('auth');
        }
    public function view(){
        return view('admin.category' );
    }
    public function save(Request $request){
        $request->validate([
            "name" => 'required' ,
        ]);
        $category= new Category;
        $category->name=request('name');
        $category->save();
    }
    public function list_view(){
        $category=Category::all();
        return $category;
    }
    public function list_delete($id){
        $category= Category::find($id);
        $category->delete();
    }
    public function update(Request $request){
        $request->validate([
            "name" => 'required' ,
        ]);
        $id=request('id');
        $category= Category::find($id);
        $category->name=request('name');
        
        $category->save();
    }
    /*public function list(Request $request){
        $data = Blog_Post::paginate(3);
        $categorys=Category::all();
        if ($request->ajax()) {
            return view('presult', compact('data','categorys'));
        }
        return view('blog',compact('data','categorys'));
    }*/
    /*public function by_category($id){
    }*/
}
