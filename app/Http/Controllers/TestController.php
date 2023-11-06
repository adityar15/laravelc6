<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class TestController extends Controller
{
    public function index(){
        return "This is about";
    }

    public function subscribe(Request $request)
    {
        $request->validate([
            "email" => ["required", "email:rfc,dns"]
        ]);
        // {key:value}
        // [key => value]
        return "You subscribed to our newsletter";
    }

   
}
