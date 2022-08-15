<?php

namespace App\Http\Controllers;

use App\Models\Users;
use Illuminate\Http\Request;

class UsersController extends Controller
{
    public function index()
    {
        $user = Users::paginate(7);
        return view('layout.user', compact(['user']));
    }
}