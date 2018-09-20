<?php

namespace App\Http\Controllers;

class StaticController extends Controller
{
    public function getAbout()
    {
        return view('about');
    }

    public function getHowItWorks()
    {
        return view('how-it-works');
    }

    public function getFeedBack()
    {
        return view('feedback');
    }
}
