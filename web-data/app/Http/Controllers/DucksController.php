<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class DucksController extends Controller
{
    public function create(Request $request)
    {
        dd($request->session()->get('access_token'));
    }
}
