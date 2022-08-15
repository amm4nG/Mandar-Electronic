<?php

namespace App\Http\Controllers;

use App\Models\Users;
use Illuminate\Http\Request;

class ProfilController extends Controller
{
    public function edit($email)
    {
        $profil = Users::where('email', $email)->first();
        return view('layout.profil', compact(['profil']));
    }

    public function update(Request $request, $id)
    {
        $profil = Users::find($id);
        $request->validate([
            'name' => 'required',
            'email' => 'required',
            'telp' => 'required'
        ]);

        $users = Users::all();
        foreach ($users as $user) {
            if ($request->email == $user->email) {
                if ($request->email == $request->email_lama) {
                    foreach ($users as $user) {
                        if ($request->telp == $user->telp) {
                            if ($request->telp == $request->telp_lama) {
                                return back();
                            }
                            $request->session()->flash('telp', 'Nomor Telepon Telah Digunakan');
                            return back();
                        }
                    }
                    $profil->update($request->except('_token', 'email_lama', 'telp_lama'));
                    $request->session()->flash('email_sukses', 'Perubahan Profile Berhasil Disimpan');
                    return back();
                }
                $request->session()->flash('email', 'Email Telah Digunakan');
                return back();
            }
        }
        $profil->update($request->except('_token', 'email_lama'));
        $request->session()->flash('email_sukses', 'Perubahan Profile Berhasil Disimpan');
        return back();
        // dd($profil);
    }
}