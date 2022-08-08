<?php

namespace App\Http\Controllers;

use App\Models\Users;
use Illuminate\Http\Request;

class UsersController extends Controller
{
    public function index()
    {
        $user = Users::all();
        return view('layout.user', compact(['user']));
    }
}