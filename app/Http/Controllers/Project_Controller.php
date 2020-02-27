<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Project_category;
use App\Project;
use Session;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Auth;


class Project_Controller extends Controller
{
    public function __construct()
        {
            $this->middleware('auth', ['except' => ['portfolio' ,'portfolio_detail']]);
        }
    public function view(){
        $projects = Project::all();
       return view('admin.project_list',compact('projects'));
    }
    public function create_view(){
        $categorys=Project_category::all();
       return view('admin.create_project', compact('categorys'));
    }
    public function delete($id){
        $project = Project::find($id);
        File::delete(public_path($project->img));
        $project->delete();

    }
        
    public function show_project($id){
        $project = Project::find($id);
        $categorys=Project_category::all();
        return view('admin.edit_project', compact('project','categorys'));
    }
    public function save(Request $request)
    {

        $request->validate([
            'project_title'=>'required',
            "sub_title" => 'required' ,
            "completed_date" =>'required'  ,
            "post_body" => 'required',
            "project_category_id" => 'required'
        ]);



        if($request->hasFile('post_image')){
            $photo = $request->file('post_image');
            $name = time() . '.'.$photo->getClientOriginalExtension();
            $photo->move(public_path().'/storage/project_img/',$name);
            $photo = '/storage/project_img/'.$name;
        }
        else{
            $photo = '';
        }
        $project = new Project;
        $project->title = request('project_title');
        $project->subtitle = request('sub_title');
        $project->client = request('client');
        $project->client_web = request('client_web');
        $project->complete_date = request('completed_date');
        $project->detail = request('post_body');
        $project->project_category_id = request('project_category_id');
        $project->img = $photo;
        $project->save();
        $projects = Project::all();
        Session::flash('message', 'Save Success');
        return redirect()->route('adminproject')->with('projects');
       
    }
    public function update(Request $request)
    {
        $request->validate([
            'project_title'=>'required',
            "sub_title" => 'required' ,
            "completed_date" =>'required'  ,
            "post_body" => 'required',
            "project_category_id" => 'required'
        ]);
        $project = Project::find(request('project_id'));

        if($request->hasFile('post_image')){
            $photo = $request->file('post_image');
            $name = time() . '.'.$photo->getClientOriginalExtension();
            $photo->move(public_path().'/storage/project_img/',$name);
            $photo = '/storage/project_img/'.$name;

             File::delete(public_path($project->img));
        }
        else{
            $photo = request('imgstr') ;
        }
        
        $project->title = request('project_title');
        $project->subtitle = request('sub_title');
        $project->client = request('client');
        $project->client_web = request('client_web');
        $project->complete_date = request('completed_date');
        $project->detail = request('post_body');
        $project->project_category_id = request('project_category_id');
        $project->img = $photo;
        $project->save();
        $projects = Project::all();
        Session::flash('message', 'Update Success');
        return redirect()->route('adminproject')->with('projects');
        
    }
    public function portfolio(){
        $project_categorys=Project_category::all();
        $projects=Project::paginate(3);
        return view("portfolio", compact('project_categorys','projects'));    
    }
    public function portfolio_detail($id){
        $project=Project::find($id);
        return view("portfolio_detail", compact('project'));
      
    }
    
}
