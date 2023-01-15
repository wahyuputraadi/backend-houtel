<?php

namespace App\Http\Controllers;

use App\Models\Kota;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Storage;

class KotaController extends Controller
{
    public function index()
    {
        $data = DB::table('kotas')->orderBy('nama_kota', 'ASC')->get(); // sama dengan SELECT * FROM kotas ORDER BY nama_kota ASC
        return view('kota.index', [
            'data' => $data,
        ]);
    }

    public function add()
    {
        return view('kota.add');
    }

    public function insert(request $request) // ditambahkan request karena ada inputan form
    {
        $request->validate(
            [
                'nama_kota' =>  'required|min:3',
                'cover' => 'required|image|file|max:2048'
            ],
            [
                'nama_kota.required' => 'Nama kota harus diisi',
                'nama_kota.min' => 'Nama minimal 3 karakter',
            ]
        );

        try {
            $image = $request->file('cover')->store('kota-images');

            Kota::create([
                'nama_kota' => $request->nama_kota,
                'cover' => $image,
                'status_publish' => $request->status_publish
            ]);

            return redirect('kota')->with([
                'success' => 'Data Berhasil Di Upload',
            ]);
        } catch (\Exception $error) {
            return redirect()->back()->with([
                'error' => "Error : " . $error->getMessage(),
            ]);
        }
    }

    public function edit($id)
    {
        $edit = kota::where('id', $id)->first();
        return view('kota.edit', compact('edit'));
    }

    public function update(Request $request)
    {

        $request->validate(
            [ // membuat validasi
                'nama_kota' => 'required|min:3',

            ],
            [
                'nama_kota.required' => 'Nama harus diisi',
                'nama_kota.min' => 'Nama minimal 3 karakter',
            ]
        );

        try {
            // ambil data kota yg dipilih berdasarkan id nya
            $update = kota::find($request->id);

            // cek apakah user mengupload file baru
            if ($request->file('cover')) {
                // hapus file lamanya = dengan nama class Storage
                Storage::delete($update->cover);

                // upload file baru
                $image = $request->file('cover')->store('kota-images');
            } else {
                // kalo tidak upload, ambil nilai lama pada field cover
                $image = $update->cover;
            }

            $update->update([
                'nama_kota' => $request->nama_kota,
                'cover' => $image,
                'status_publish' => $request->status_publish,
            ]);

            return redirect('kota')->with([
                'success' => "Update Data Berhasil"
            ]);
        } catch (\Exception $error) {
            return redirect()->back()->with([
                'error' => "Error : " . $error->getMessage(),
            ]);
        }
    }

    public function delete($id)
    {
        try {
            // ambil dulu data kota yang dipilih berdasarkan id nya
            // fungsinya untuk mengambil nilai cover agar bisa diselesaikan dan dihapus filenya
            $delete = kota::find($id);

            // hapus filenya jika ada
            if ($delete->cover) {
                Storage::delete($delete->cover);
            }

            // hapus data record pada tabel kota berdasarkan id nya
            kota::destroy($id);

            return redirect('kota')->with([
                'success' => "Data Berhasil Dihapus"
            ]);
        } catch (\Exception $error) {
            return redirect()->back()->with([
                'error' => "Error : " . $error->getMessage(),
            ]);
        }
    }
}
