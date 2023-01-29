<?php

namespace App\Http\Controllers;

use App\Models\Admin as ModelsAdmin;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

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

    // mengambil detail data admin

    public function detail($id){

        $data = ModelsAdmin::find($id);

        return response()->json($data);
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

    // menambahkan admin baru
    public function store(Request $req){

        // validasi input
        $validate = $req->validate([
            "nama" => "string|required|max:50",
            "email" => "email:rfc,dns|required",
            "password" => "required",
            "telepon" => "required"
        ]);

        // hash password
        $validate['password'] = Hash::make($req->password);

        ModelsAdmin::create($validate);

        return redirect("/login");
    }

    public function login(Request $req){

        $validation = $req->validate([
            "email" => "email:rfc,dns|required",
            "password" => "required",
        ]);

        // mendapatkan user berdasarkan email
        $admin = ModelsAdmin::where("email", $validation['email']);

        // cek apakah user ada
        if($admin->exists()){

            $u = $admin->first();

            // cek apakah password nya valid
            if(Hash::check($validation['password'], $u->password)){

                // set session
                $req->session()->put("user_id", $u->id);
                $req->session()->put("user_nama", $u->nama);

                // jika arahkan ke home page
                return redirect("/dashboard");
            }else{
                return redirect('/login')->with("login-failed", "password salah");
            }
        }else{

            return redirect('/login')->with("login-failed", "email tidak terdaftar");
        }
    }

    public function logout(Request $req){
        $req->session()->put("user_id");
        $req->session()->put("user_nama");
        return redirect("/login");
    }

    // edit admin
    public function edit(Request $req, $id)
    {
       $user = ModelsAdmin::find($id);

       $user->nama = $req->nama;
       $user->email = $req->email;
       $user->telepon = $req->telepon;
       $user->password = $req->password;
       
       $user->update();

       return redirect('/dashboard/user');
        
    }

}
