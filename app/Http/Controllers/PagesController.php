<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Post;
use Session;
use Mail;

class pagesController extends Controller
{

    public function index()
    {

        $posts = Post::orderBy('created_at', 'desc')->limit(4)->get();
        return view('pages.index')->withPosts($posts);
    }

    public function about()
    {
        return view('pages.about');
    }

    public function getContact()
    {
        return view('pages.contact');
    }

    public function postContact(Request $request)
    {
        $this->validate($request,array(
            'email_from' => 'required | email',
            'message' => 'required | min:10',
            'subject' => 'required | min:3'
            )
        );

        $data= array(
            'email_from'=>$request->email_from,
            'bodymessage'=>$request->message,
            'subject' => $request->subject
            );
        

        Mail::send('email.contact',$data,function($message)use ($data){
            $message->from($data['email_from']);
            $message->to('shihab.gsc10@gmail.com');
            $message->subject($data['subject']);

        });

        Session::flash('success','Your mail has been sent ');


        return url('/');

    }

}
