<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Pendaftaran;
use App\Models\User;
use Yajra\DataTables\Facades\DataTables;
use Carbon\Carbon;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class PendaftaranController extends Controller
{
    public function index()
    {

        return view('data_transaksi.pendaftaran.index');
    }

    public function edit($id)
    {

        $pendaftaran = Pendaftaran::where('id_pendaftaran', $id)->firstOrFail();

        $updateData = [
            'dibaca' => 'Y'

        ];
        Pendaftaran::where('id_pendaftaran', $id)->update($updateData);

        return view('data_transaksi.pendaftaran.edit', compact('pendaftaran'));
    }

    public function show($id_pendaftaran)
    {
        return response()->json(Pendaftaran::findOrFail($id_pendaftaran));
    }

    public function update(Request $request, $id)
    {


        $updateData = [
            'pesan' => 'ok'
        ];
        Pendaftaran::where('id_pendaftaran', $id)->update($updateData);

        $storeData = [
            'nama_lengkap' => $request->input('nama'),
            'id_registrasi' => $id,
            'email' => $request->input('email'),
            'no_telp' => $request->input('no_telp'),
            'username' => uniqid(),
            'pwd' => uniqid(),
            'password' => Hash::make(uniqid()),
            'level' => 'customer',
            'blokir' => 'N',
            'id_session' => uniqid()
        ];
        User::create($storeData);


        return redirect('pendaftaran')->with('alert-success', 'Success Otorisasi Data');
    }



    public function getData()
    {
        $pendaftaran = Pendaftaran::select(['id_pendaftaran', 'nama', 'telp', 'email', 'perusahaan', 'alamat', 'pesan']);

        return DataTables::of($pendaftaran)
            ->addIndexColumn()
            ->addColumn('action', function ($row) {
                $editRoute = route('pendaftaran.edit', ['pendaftaran' => $row->id_pendaftaran]);
                //$deleteRoute = route('penugasan_personil.destroy', ['penugasan_personil' => $row->id]);
                if ($row->pesan == 'ok') {
                    $btn = 'Sudah diotorisasi';
                } else {
                    $btn = '<div class="btn-group"><a href="' . $editRoute . '" class="btn btn-warning">Detail</a>';
                }

                // $btn .= '<form method="POST" action="' . $deleteRoute . '" style="display: inline-block; margin-left: 10px;" onsubmit="return confirm(\'Apakah anda yakin?\')">';
                // $btn .= '<button type="submit" class="btn btn-danger"><i class="fas fa-trash"></i></button>';
                // $btn .= csrf_field(); // Blade directive for CSRF token
                // $btn .= method_field("DELETE"); // Blade directive for HTTP method spoofing
                // $btn .= '</div>';

                return $btn;
            })
            ->rawColumns(['action'])
            ->make(true);
    }
}
