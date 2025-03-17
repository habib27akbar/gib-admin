<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Pendaftaran;
use Yajra\DataTables\Facades\DataTables;
use Carbon\Carbon;

class PendaftaranController extends Controller
{
    public function index()
    {

        return view('data_transaksi.pendaftaran.index');
    }

    public function show($id_pendaftaran)
    {
        return response()->json(Pendaftaran::findOrFail($id_pendaftaran));
    }


    public function getData(Request $request)
    {
        $pendaftaran = Pendaftaran::select(['id_pendaftaran', 'nama', 'telp', 'email', 'perusahaan', 'alamat']);

        return DataTables::of($pendaftaran)
            ->addIndexColumn()
            ->addColumn('action', function ($row) {
                $editRoute = route('pendaftaran.edit', ['pendaftaran' => $row->id_pendaftaran]);
                //$deleteRoute = route('penugasan_personil.destroy', ['penugasan_personil' => $row->id]);

                $btn = '<div class="btn-group"><a href="' . $editRoute . '" class="btn btn-warning">Detail</a>';
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
