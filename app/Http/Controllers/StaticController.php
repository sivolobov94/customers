<?php

namespace App\Http\Controllers;

class StaticController extends Controller
{
    public function getAbout()
    {
        return view('static.about');
    }

    public function getHowItWorks()
    {
        return view('static.how-it-works');
    }

    public function getFeedBack()
    {
        return view('static.feedback');
    }
}
