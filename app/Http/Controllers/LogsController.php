<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Log;

class LogsController extends Controller
{

    public function index()
    {

        $logs = Log::all();

        return $logs;
    }

    public function show($username)
    {

        $logs = Log::where('username', $username)->get();

        return $logs;
    }

    public function store(Request $req)
    {

        $log = new Log();
        $log->command = $req->command;
        $log->commandType = $req->commandType;
        $log->status = $req->status;
        $log->error = $req->error;
        $log->username = $req->username;

        $log->save();

        return $log;
    }

    public function exportCsv()
    {
        $fileName = 'logs.csv';
        $logs = Log::all();

        $headers = array(
            "Content-type"        => "text/csv",
            "Content-Disposition" => "attachment; filename=$fileName",
            "Pragma"              => "no-cache",
            "Cache-Control"       => "must-revalidate, post-check=0, pre-check=0",
            "Expires"             => "0"
        );

        $columns = array('command', 'commandType', 'status', 'error', 'date');

        $callback = function () use ($logs, $columns) {
            $file = fopen('php://output', 'w');
            fputcsv($file, $columns);

            foreach ($logs as $log) {
                $row['command']  = $log->command;
                $row['commandType'] = $log->commandType;
                $row['status']  = $log->status;
                $row['error']  = $log->error;
                $row['date']  = $log->created_at;

                fputcsv($file, array($row['command'], $row['commandType'], $row['status'], $row['error'], $row['date']));
            }

            fclose($file);
        };

        return response()->stream($callback, 200, $headers);
    }
}
