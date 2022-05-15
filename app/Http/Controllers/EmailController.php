<?php

namespace App\Http\Controllers;

use App\Mail\LogsMail;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;

class EmailController extends Controller
{
    //
    public function email() {
        Mail::to('erikzurvalec86@gmail.com')->send(new LogsMail());
    }
}
