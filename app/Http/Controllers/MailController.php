<?php

namespace App\Http\Controllers;

use App\Mail\TestMail;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;

class MailController extends Controller
{
    public function sendEmail()
    {
        // $details = [
        //     'title' => 'Mail from uzair',
        //     'body' => 'Your Complaint is resolved.',
        // ];

        // Mail::to('testloremm@gmail.com')->send(new TestMail($details));
        // return "Email Sent";

        $data=['name'=>"uzair",'data'=>'Your Complaint is resolved'];
        $user['to']='testloremm@gmail.com';
        Mail::send('emails.TestMail', $data, function($messages) use ($user) {
            $messages->to($user['to']);
            $messages->subject('Hello Sir');

        });
        return redirect('/dashboard')->with('flash', 'resolved!');
    }
}
