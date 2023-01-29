<?php

namespace App\Http\Controllers;
use Illuminate\Auth\Events\Validated;
use Illuminate\Http\Request;
use App\Models\Admin;
use Illuminate\Support\Facades\Hash;

class RegisterController extends Controller
{
    public function index()
    {
        return view('register.index', [
            'title' => 'Register'
        ]);

    }
    public function store (Request $request)
    {
        $validatedData = $request->validate([
            'name'=>'required|max:255',
            'username'=>'required|max:255',
            'email'=>'email:dns|unique:users',
            'password'=>'required|min:5|max:255'
        ]);
        $validatedData['password'] = Hash::make($validatedData['password']);

        Admin::create($validatedData);
        return redirect('/login')->with('sukses', 'Registrasi Berhasil, Silahkan Login !');
    
    }

}