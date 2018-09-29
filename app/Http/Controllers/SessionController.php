<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class SessionController extends Controller
{
    //showing Log in page
    public function create(){
        return view('session.create');
    }

    //Logout Function
    public function destroy(){

        auth()->logout();
        $notification = [
            'message' => 'Logout Successfully!',
            'alert-type' => 'success'
        ];
        return redirect('/')->with($notification);
    }

    public function store()
    {
        if (auth()->attempt(request(['email' , 'password']))) {
            $notification = [
                'message' => 'Login Successfully!',
                'alert-type' => 'success'
            ];
            return  redirect('/customer')->with($notification);
        }else{
            $notification = [
                'message' => 'Please check your creddential and try again!',
                'alert-type' => 'error'
            ];
            return  redirect('/')->with($notification);
        }
    }
}
