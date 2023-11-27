<?php

namespace App\Http\Controllers;

use App\Models\User;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Validation\ValidationException;
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

    public function register(Request $request)
    {
        $request->validate([
            'name' => ['required', 'min:3'],
            'email' => ['required', 'email:rfc,dns', 'unique:users,email'],
            'password' => ['required', 'min:6', 'max:16']
        ]);

        // if(!str_contains($request->password, "Aditya"))
        // {
        //     throw ValidationException::withMessage([
        //         'password' => 'Please use word Aditya in your password'
        //     ]);
        // }

        $user = User::create([
            'name' => $request->name,
            'email' => $request->email,
            'password' => Hash::make($request->password)
        ]);

        // send an email to the user so that they verify

        // web response
        return redirect()->back();

    }

    public function login(Request $request)
    {  
        $request->validate([
            'email' => ['required', 'email:rfc,dns', 'exists:users,email'],
            'password' => ['required', 'min:6', 'max:16']
        ]);


        // $user = User::where('email', $request->email)->first();
        // Hash::check($request->password, $user->password);

       if( Auth::attempt(['email' => $request->email, 'pwd' => $request->password]))
        {
            // go to dashboard
            // auth()->user();

            return redirect('/dashboard');
        }

        throw ValidationException::withMessages(['email' => "Invalid Credentials"]);

    }
   
}
