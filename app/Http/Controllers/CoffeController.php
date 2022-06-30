<?php

namespace App\Http\Controllers;

use App\Http\Requests\CreateUserRequest;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;

class CoffeController extends Controller


{
    public function home(){
        $user = Session::get('user');//zemi od sesijata user
        
        return view('users.home')->with('user', $user);//vrati me na users.home so(with) user od sesijata,a user e to od formata
    }


 
    public function create()
    {

        return view('users.index');
    }

    public function store(CreateUserRequest $request)
    {
        Session::put('user', $request->all()); //vo sesija pod imeto user gi stavam vrednostite od formata
        return redirect()->route('users.info');//ko ke pricnish submit da te nosi na users.info

    }

    public function show(){
        $user = Session::get('user');
        return view('users.info')->with('user', $user);

    }

    public function logout() {
        Session::remove('user');
        return redirect('/');
    }
}
