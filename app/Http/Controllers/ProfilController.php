<?php

namespace App\Http\Controllers;

use App\Models\Users;
use Illuminate\Http\Request;

class ProfilController extends Controller
{
    public function edit($id)
    {
        $profil = Users::find($id);
        return view('layout.profil', compact(['profil']));
    }
}