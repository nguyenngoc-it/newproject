<?php

namespace App\Http\Controllers;

use App\Http\Requests\SignupRequest;
use App\Models\User;
use Illuminate\Http\Request;

class UserController extends Controller
{
    public function store(SignupRequest $request)
    {
        $user= new User();
        $user->name= $request->name;
        $user->email= $request->email;
        $user->password= $request->password;
        $user->save();
        return view('backend.auth.register');
    }


    function  create(){
        return view('backend.auth.register');
    }

    public function login(Request $request)
    {
        $user=User::where('name',$request->name, 'password',$request,'password');
        return view('backend.products.list');


    }
}
