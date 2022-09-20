<?php

namespace App\Http\Controllers;

use App\Models\Admin as ModelsAdmin;
use Illuminate\Http\Request;

class AdminController extends Controller
{
    // buat admin baru
    public function new_admin(Request $req){
        $admin = new ModelsAdmin;

        $admin->nama = $req->nama;
        $admin->email = $req->email;
        $admin->telepon = $req->telepon;
        $admin->password = $req->password;

        $admin->save();

        return redirect('/dashboard/user');
    }

    // nampilkan list semua admin
    public function index(Request $req){

        $data = ModelsAdmin::all();

        $payload = [
            "data" => $data,
        ];

        return view("user_dashboard", $payload);
    }

    // hapus admin
    public function hapus($id){
        $user = ModelsAdmin::find($id);

        $user->delete();

        return redirect('/dashboard/user');
    }

}
