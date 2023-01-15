<?php

namespace App\Http\Controllers;

use App\Models\Hotel;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class HotelController extends Controller
{
   public function index()
   {
      $data = DB::table('hotels')->orderBy('kota_id', 'ASC')->get();
      return view('hotel.index')->with([
         'data' => $data,
      ]);
   }

   public function add()
   {
      return view('hotel.add');
   }

   public function insert(Request $request)
   {
      $request->validate(
         [
            'kota_id' => 'required',
            'nama_hotel' => 'required|min:3',
            'gambar' => 'required|image|file|max:2048',
            'harga' =>  'required|min:4|max:7',
            'alamat' => 'required|min:5',
         ],
         [
            'kota_id.required' => 'Kota harus diisi',
            'nama_hotel.required' => 'Nama kota harus diisi',
            'nama_hotel.min' => 'Nama minimal 3 karakter',
            'gambar.required' => 'gambar wajib diisi',
            'harga.required' => 'harga wajib diisi',
            'harga.min' => 'Harga minimal 3 karakter',
            'harga.max' => 'Harga maximal73 karakter',
            'alamat.required' => 'Alamat harus diisi',
         ]
      );

      try {
         $image = $request->file('gambar')->store('kota-images');

         Hotel::create([
            'kota_id' => $request->kota_id,
            'nama_hotel' => $request->nama_hotel,
            'gambar' => $image,
            'harga' => $request->harga,
            'alamat' => $request->alamat,

         ]);

         return redirect('hotel')->with([
            'success' => 'Data Berhasil Di Upload',
         ]);
      } catch (\Exception $error) {
         return redirect()->back()->with([
            'error' => 'Error : ' . $error->getMessage(),
         ]);
      }
   }
}
