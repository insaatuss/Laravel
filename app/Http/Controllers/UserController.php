<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class UserController extends Controller
{
    function index(){
        return "Index UserController";
    }

    public function __construct()
    {
        $this->middleware('auth');
    }
}
