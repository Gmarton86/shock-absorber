<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Log;

class LogsController extends Controller
{
    
    public function index() {
        
        $logs = Log::all();

        return $logs;
    }

    public function show($username) {
        
        $logs = Log::where('username', $username)->get();

        return $logs;
    }

    public function store(Request $req) {

        $log = new Log();
        $log->command = $req->command;
        $log->commandType = $req->commandType;
        $log->status = $req->status;
        $log->error = $req->error;
        $log->username = $req->username;
        
        $log->save();

        return $log;
    }

}
