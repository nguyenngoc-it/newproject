<?php

namespace App\Http\Controllers;

use App\Http\Requests\SignupRequest;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class UserController extends Controller
{
    public function store(SignupRequest $request)
    {
        $user = new User();
        $user->name = $request->name;
        $user->email = $request->email;
        $user->password = Hash::make($request->password);
        $user->save();
        $data = [
            'name' => $user->name,
            'password' => $request->password,
        ];
//        dd($data);
        return redirect()->route('showFormLogin')->with('data', $data);
//        return view('backend.auth.register');
    }


    function create()
    {
        return view('backend.auth.register.register');
    }

    public function showFormLogin()
    {
        return view('backend.auth.login.login');
    }

    public function login(Request $request)
    {
        $data = array('name' => $request->username, 'password' => $request->password);
//        dd($data);

        if (Auth::attempt($data)) {
//            dd($data);


            return redirect()->route('product.index');
        } else {
            return redirect()->back();
        }

    }

    function logOut()
    {
        session()->flush();
        Auth::logout();
        return redirect()->route('showFormLogin');
    }
}
