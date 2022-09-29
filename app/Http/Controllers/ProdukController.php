<?php

namespace App\Http\Controllers;

use App\Models\Produk;
use App\Http\Requests\StoreProdukRequest;
use App\Http\Requests\UpdateProdukRequest;
use App\Models\Kategori;
use Illuminate\Http\Request;

class ProdukController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        return view('home_dashboard', [
            "kategori" => Kategori::all(),
            "produk" => Produk::all(),
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create(Request $req)
    {
        //
        
        if($req->file()){

            // mengambil data kategori
            $kategori = Kategori::find($req->kategori);

            // data produk
            $produk = new Produk;
            $produk->nama = $req->nama;
            $produk->harga = $req->harga;

            // data foto produk
            if($req->hasFile('foto')){
                $req->file('foto')->move('foto-produk/', $req->file('foto')->getClientOriginalName());
                $produk->foto = $req->file('foto')->getClientOriginalName();
            }

            // 
            $kategori->produk()->save($produk);

            return redirect('/dashboard');
        }else{
            return "gagal";
        }

    }

    /**
     * Menghapus produk
     */

    public function delete($id){
        $produk = Produk::find($id);
        $produk->delete();

        return redirect("/dashboard");
    }

    /**
     * detail produk
     */
    
    public function detail($id){

        $data = Produk::find($id);

        return response()->json($data);
    }
    /**
     * Store a newly created resource in storage.
     *
     * @param  \App\Http\Requests\StoreProdukRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreProdukRequest $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Produk  $produk
     * @return \Illuminate\Http\Response
     */
    public function show(Produk $produk)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Produk  $produk
     * @return \Illuminate\Http\Response
     */
    public function edit(Request $req, $id){
        $produk = Produk::find($id);

        if($req->file()){

            // mengambil data kategori
            $kategori = Kategori::find($req->kategori);

            // data produk
            $produk->nama = $req->nama;
            $produk->harga = $req->harga;

            // data foto produk
            $filename = $req->file("foto-produk")->getClientOriginalName();
            $produk->foto = $filename;
            $path = $req->file("foto-produk")->storeAs("/public/img", $filename, 'public');

            // 
            $kategori->produk()->save($produk);

            $produk->update();

            return redirect("/dashboard");
        }else{
            return "gagal";
        }
     }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\UpdateProdukRequest  $request
     * @param  \App\Models\Produk  $produk
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateProdukRequest $request, Produk $produk)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Produk  $produk
     * @return \Illuminate\Http\Response
     */
    public function destroy(Produk $produk)
    {
        //
    }
}
