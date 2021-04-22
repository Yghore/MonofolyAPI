<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;

class VersionController extends Controller
{


    
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $version = DB::table('version')->latest()->first();
        if(!empty($version))
        {
            return response()->json($version);
        }
        return response()->json(['version' => "1.0"]);
    }
}
