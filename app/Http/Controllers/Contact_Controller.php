<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;
use App\Mail\SendMail;

class Contact_Controller extends Controller
{
    function send(Request $request)
    {
     $this->validate($request, [
      'name'     =>  'required',
      'email'  =>  'required|email',
      'message' =>  'required',
      'subject' =>  'required',
     ]);

        $data = array(
            'name'      =>  $request->name,
            'message'   =>   $request->message,
            'subject'   =>  $request->subject,
            'email'   =>  $request->email
        );

     Mail::to('senglikareng@gmail.com')->send(new SendMail($data));
     return back()->with('success', 'Thanks for contacting us!');

    }
}
