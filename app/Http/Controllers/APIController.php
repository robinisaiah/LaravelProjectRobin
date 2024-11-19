<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Jobs\LogRandomStringJob;

class APIController extends Controller
{
    public function dispatchJob()
    {
        LogRandomStringJob::dispatch();
        return response()->json(['message' => 'Job dispatched']);
    }
}
