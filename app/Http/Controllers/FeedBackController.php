<?php

namespace App\Http\Controllers;

use App\Mail\FeedBack;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;

class FeedBackController extends Controller
{
    public function send(Request $request)
    {
        //Mail::to(env('ADMIN_EMAIL'))->send(new FeedBack($request));
        Mail::raw($request->message, function($message) use ($request)
        {
            $message->from($request->email, $request->name);
            $message->to(env('ADMIN_EMAIL'));
        });

        return view('mail.feedback-success');
    }
}