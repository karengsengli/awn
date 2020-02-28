<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Blog_Post;
use App\Category;
use App\Newsletter;
use Session;
use App\Mail\Sendnoti;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Auth;

class Post_Controller extends Controller
{
    public function __construct()
        {
            $this->middleware('auth', ['except' => ['view_post','single_post','top_posts','fetch_data']]);
        }

    public function template(){
        return view("admin.template");

    }    
    
    public function view(){
        $categorys=Category::all();
        return view('admin.blog_post', compact('categorys'));

    }
    public function list_view(){
        $posts = Blog_Post::all();
        return view("admin.blog_list", compact('posts'));

    }
    public function delete($id){
        $post = Blog_Post::find($id);
        File::delete(public_path($post->img));
        $post->delete();
    }
    public function show_post($id){
        $categorys=Category::all();
        $post = Blog_Post::find($id);
        return view("admin.edit_blog_post", compact('categorys', 'post'));
    }
    public function user_view(){
        $post = Blog_Post::orderBy('created_at', 'desc')->take(10)->get();
        return view("admin.edit_blog_post", compact('post'));
    }
    public function save_post(Request $request)
    {
        $request->validate([
            "post" => 'required|min:2' ,
            "detail" =>'required|min:3'  ,
            "category_id" => 'required'
        ]);
        if($request->hasFile('img')){
            $photo = $request->file('img');
            $name = time() . '.'.$photo->getClientOriginalExtension();
            $photo->move(public_path().'/storage/post_img/',$name);
            $photo = '/storage/post_img/'.$name;

        }
        else{
            $photo = '';
        }
        
        $post = new Blog_Post;
        $post->title = request('post');
        $post->details = request('detail');
        $post->img = $photo;
        $post->category_id = request('category_id');
        $post->view = 0;
        $post->save();
        $posts = Blog_Post::all();
         $allmails=Newsletter::all();

        $data = array(
            'title'   =>  request('post'),
            'id'   =>  $post->id,
        ); 
        foreach ($allmails as $mail){   
            Mail::to($mail->mail)->send(new Sendnoti($data));
        };

        Session::flash('message', 'Save Success');
        return redirect()->route('admin_blog')->with('posts');
    }
    public function update_post(Request $request)
    {
        $request->validate([
            "post" => 'required|min:2' ,
            "detail" =>'required|min:3'  ,
            "category_id" => 'required',
            "post_id" => 'required',
        ]);
        $id=request('post_id');
        $post =Blog_Post::find($id);
        if($request->hasFile('img')){
            $photo = $request->file('img');
            $name = time() . '.'.$photo->getClientOriginalExtension();
            $photo->move(public_path().'/storage/post_img/',$name);
            $photo = '/storage/post_img/'.$name;
            File::delete(public_path($post->img));
        }
        else{
            $photo = request('imgstr') ;
        }
        
        $post->title = request('post');
        $post->details = request('detail');
        $post->img = $photo;
        $post->category_id = request('category_id');
        $post->save();
        $posts = Blog_Post::all();
        Session::flash('message', 'Update Success');
        return redirect()->route('admin_blog')->with('posts');
    }
    public function view_post(Request $request){
        $data = Blog_Post::paginate(3);
        $count = Blog_Post::all()->count();
        $categorys=Category::with('blog_post')->get();

        /*if ($request->name) {
            $data = Blog_Post::where('category_id',request('my_id'))->paginate(3);
            return view('presult', compact('data','categorys'));    
        }
        if ($request->ajax()) {
            return view('presult', compact('data','categorys'));
        
        }*/
        return view('blog',compact('data','categorys','count'));
        /*return view("blog");*/
    }
    /*public function view_all_post(){
        $posts=Blog_Post::all();
        return $posts;
    }*/
    public function single_post($id){
        $post = Blog_Post::find($id);
        $view=$post->view+1;
        $post->view=$view;
        $post->save();
        $previous_id = Blog_Post::where('id', '<', $post->id)->max('id');
        $next_id = Blog_Post::where('id', '>', $post->id)->min('id');
        $previous=Blog_Post::find($previous_id);
        $next=Blog_Post::find($next_id);
        return view("single_blog", compact('post', 'previous','next'));
    }
    public function top_posts(){
        $posts = Blog_Post::orderBy('view', 'desc')->take(5)->get();
        return $posts;
    }
    function fetch_data(Request $request)
    {
        $all=request("category");
        if ($all=='all') {
            if($request->ajax())
             {
              $data = Blog_Post::paginate(3);
              return view('presult', compact('data'))->render();
             }
            # code...
        }
        else{
            if($request->ajax())
             {
              $data = Blog_Post::where('category_id',request('category'))->paginate(3);
              return view('presult', compact('data'))->render();
             }

        }
     
    }

}
