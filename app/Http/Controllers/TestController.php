<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Inertia\Inertia;

class TestController extends Controller
{
    public function index(Request $request){
        // dd($request->search);
        // pattern match using sql like operator 
        $users = User::where('name', 'like', "%".$request->search."%")->paginate(10);
        // dd($users);
        // select * from users
        // select * from users skip 40 limit 10
        return Inertia::render("About", ['users' => $users]);

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
