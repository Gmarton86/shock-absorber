<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;

class SessionController extends Controller
{
    public function getSessionData(Request $request){
        if (Session::has('name')){
            return view('about');
        }
    }
    
    public function storeSession(Request $request){
        Session::put('name', $request->name);
    }

    public function deleteSession(Request $request){
        Session::flush();
    }
}
