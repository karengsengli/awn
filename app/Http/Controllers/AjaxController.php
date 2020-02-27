<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Blog_Post;

class AjaxController extends Controller
{
    public function ajaxPagination(Request $request)

    {

        $data = Blog_Post::paginate(5);

  

        if ($request->ajax()) {

            return view('presult', compact('data'));

        }

  

        return view('ajaxPagination',compact('data'));

    }
}
