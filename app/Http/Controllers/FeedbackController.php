<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;

class FeedbackController extends Controller
{
    public function send(Request $request)
    {
        //Mail::to(env('ADMIN_EMAIL'))->send(new FeedBack($request));
        $user_message = $request->message;
        $user_email = $request->email;
        $user_name = $request->name;

        Mail::raw($user_message, function ($message) use ($user_email, $user_name) {
            $message->from($user_email, $user_name);
            $message->to(env('ADMIN_EMAIL'));
        });

        return view('mail.feedback-success');
    }
}
