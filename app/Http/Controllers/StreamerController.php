<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class StreamerController extends Controller
{
    public function home(){
        $results = [];
        $query='';
        return view('home',compact('results','query'));
    }
}
