<?php

namespace App\Http\Controllers;

use App\Models\Produk;
use Illuminate\Http\Request;

class ProdukController extends Controller
{
    public function index()
    {
        $produk = Produk::all();
        return view('master.produk.index', compact('produk'));
    }

    public function create()
    {

        return view('master.produk.create');
    }

    public function store(Request $request)
    {
        $nama_image = null;
        if ($request->file('gambar')) {
            $image = $request->file('gambar');
            $nama_image = 'gambar-' . uniqid() . '-' . $image->getClientOriginalName();
            $dir = 'img/produk';
            $image->move(public_path($dir), $nama_image);
        }

        $storeData = [
            'nama_produk' => $request->input('nama_produk'),
            'deskripsi' => $request->input('deskripsi'),
            'gambar' => $nama_image,
            'active' => $request->input('active'),
        ];
        Produk::create($storeData);
        return redirect('produk')->with('alert-success', 'Success Tambah Data');
    }


    public function edit($id)
    {
        //$foto = Slider::all();
        //dd($sejarah);
        $produk = Produk::findOrFail($id);

        return view('master.produk.edit', compact('produk'));
    }

    public function update(Request $request, $id)
    {

        $nama_image = $request->input('image_old');
        if ($request->file('gambar')) {
            $image = $request->file('gambar');
            $nama_image = 'gambar-' . uniqid() . '-' . $image->getClientOriginalName();
            $dir = 'img/produk';
            $image->move(public_path($dir), $nama_image);
        }
        $updateData = [
            'nama_produk' => $request->input('nama_produk'),
            'deskripsi' => $request->input('deskripsi'),
            'gambar' => $nama_image,
            'active' => $request->input('active'),
        ];
        Produk::where('id', $id)->update($updateData);
        return redirect('produk')->with('alert-success', 'Success Update Data');
    }

    public function destroy($id)
    {
        Produk::findOrFail($id)->delete();
        return redirect('produk')->with('alert-success', 'Success deleted data');
    }
}
