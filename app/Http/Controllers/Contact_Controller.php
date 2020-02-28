<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;
use App\Mail\SendMail;
use App\Newsletter;

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

     Mail::to('thant.z59@rsu.ac.th')->send(new SendMail($data));
     return back()->with('success', 'Thanks for contacting us!');

    }
    function newsletters(Request $request)
    {
     $request->validate([
      'email'  =>  'required|email',
     ]);
     $find= Newsletter::where("mail",request('email'))->get()->first();
     if (!empty($find)) {
      $message='You already subscribe';
      $mail_id=$find->id;
      $my_mail=$find->mail;
      $data=[$message , $mail_id, $my_mail]; 
      return $data;
       # code...
     }
     else{
      $newsletter= new Newsletter;
     $newsletter->mail=request('email');
     $newsletter->save();
     $data='Subscribed';
     $datas=[$data]; 
      return $datas;

     }

     
    }
    function remove_subscribe($id){
      $newsletter=Newsletter::find($id);
      $newsletter->delete();
    }
}
