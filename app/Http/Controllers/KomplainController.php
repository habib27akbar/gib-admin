<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Komplain;

class KomplainController extends Controller
{
    public function index()
    {

        return view('data_transaksi.komplain.index');
    }

    public function create()
    {

        return view('data_transaksi.komplain.create');
    }

    public function edit($id)
    {
        //$foto = Slider::all();
        //dd($sejarah);
        $komplain = Komplain::findOrFail($id);

        return view('data_transaksi.komplain.edit', compact('komplain'));
    }

    public function store(Request $request)
    {
        $nama_image = null;
        if ($request->file('gambar')) {
            $image = $request->file('gambar');
            $nama_image = 'gambar-' . uniqid() . '-' . $image->getClientOriginalName();
            $dir = 'img/komplain';
            $image->move(public_path($dir), $nama_image);
        }

        $nama_image_galeri = null;
        if ($request->file('gambar_galeri')) {
            $image_galeri = $request->file('gambar_galeri');
            $nama_image_galeri = 'gambar_galeri-' . uniqid() . '-' . $image_galeri->getClientOriginalName();
            $dir = 'img/kunjungan';
            $image_galeri->move(public_path($dir), $nama_image_galeri);
        }

        $storeData = [
            'user_id' => auth()->id(),
            'pesan' => $request->input('pesan'),
            'gambar' => $nama_image,
            'gambar_galeri' => $nama_image_galeri,
            'sts' => 0,
        ];
        Komplain::create($storeData);
        return redirect('komplain')->with('alert-success', 'Success Tambah Data');
    }

    public function update(Request $request, $id)
    {

        $nama_image = $request->input('gambar_old');
        if ($request->file('gambar')) {
            $image = $request->file('gambar');
            $nama_image = 'gambar-' . uniqid() . '-' . $image->getClientOriginalName();
            $dir = 'img/komplain';
            $image->move(public_path($dir), $nama_image);
        }

        $nama_image_galeri = $request->input('gambar_galeri_old');
        if ($request->file('gambar_galeri')) {
            $image_galeri = $request->file('gambar_galeri');
            $nama_image_galeri = 'gambar_galeri-' . uniqid() . '-' . $image_galeri->getClientOriginalName();
            $dir = 'img/komplain';
            $image_galeri->move(public_path($dir), $nama_image_galeri);
        }

        $updateData = [
            'user_id' => auth()->id(),
            'pesan' => $request->input('pesan'),
            'gambar' => $nama_image,
            'gambar_galeri' => $nama_image_galeri
        ];
        Komplain::where('id', $id)->update($updateData);
        return redirect('komplain')->with('alert-success', 'Success Update Data');
    }

    public function destroy($id)
    {
        Komplain::findOrFail($id)->delete();
        return redirect('komplain')->with('alert-success', 'Success deleted data');
    }
}
