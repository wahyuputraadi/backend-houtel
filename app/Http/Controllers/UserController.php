<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;


class UserController extends Controller
{
    // halaman utama user
    public function index()
    {
        // membuat variabel untuk menyimpan data user dari query tabel users
        // $user = User::all(); // ELOQUENT (Menggunakan Modelnya) all => SELECT * FROM users
        $user = User::OrderBy('name', 'ASC')->get(); // ELOQUENT (Menggunakan Modelnya) get => SELECT * FROM users // bisa dikombinasikan 
        // $data = DB::table('users')->orderBy('name','ASC')->get(); // DB Query / Query builder
        // dd($data); // menampilkan seluruh data
        return view('user.index', compact(['user']));
    }

    // menambahkan form tambah
    public function add()
    {
        return view('user.add');
    }

    // insert data ke tabel
    public function insert(Request $request)
    {
        // menggunakan elequent
        // function create data menggunakan elequent (Model) Laravel
        // kondisi jika fungsi yang kita buat berhasil dijalankan apabila error maka ditampilkan  pda catch

        $request->validate(
            [ // membuat validasi
                'name' => 'required|min:3',
                'email' => 'required|email|unique:users', // arahkan ke tabel user
                'password' => 'required|min:5',
            ],
            [
                'name.required' => 'Nama harus diisi',
                'email.required' => 'Email harus diisi',
                'email.unique' => 'Email harus diisi',
            ]
        );

        try {
            User::create([
                'name' => $request->name,
                'email' => $request->email,
                'password' => Hash::make($request->password), // untuk membuat password ter-encryption
                'role' => $request->role,
            ]);

            // $user = new User();
            // $user->name = $request->name;
            // $user->email = $request->email;
            // $user->password = Hash::make($request->password);
            // $user->role = $request->role;
            // $user->save();

            return redirect('user')->with([
                'success' => 'Update Success',
            ]);; // kembali kehalaman utama saat menu user di klik
        } catch (\Exception $error) {
            return redirect()->back()->with([
                'error' => 'Error :' . $error->getMessage(),
            ]);
        }
    }

    // Halaman Edit 
    // Function edit (mengambil satu data yang dipilih berdasarkan id/primary/apapun yang menjadi parameter sesuai kebutuhan)
    // basicnya hanya satu data yang di update berdasarkan data yang dipilih
    public function Edit($id)
    {
        // query mengambil data berdasarkan id nya / data yang dipilih
        $edit = User::find($id); // SELECT * FROM users WHERE id = $id, fungsi find itu wajib primary key nya adalah id (kecuali kalo sudah diset di Modelnya)
        return view('user.edit', compact(['edit']));
    }

    public function Update(Request $request)
    {

        // ambil data berdasarkan yang dipilih / berdasarkan id yang dikirim
        $update = User::where('id', $request->id);

        $request->validate(
            [ // membuat validasi
                'name' => 'required|min:3',

            ],
            [
                'name.required' => 'Nama harus diisi',
                'name.min' => 'Nama minimal 3 karakter',
            ]
        );

        try {
            if ($request->password == "") {
                // maka passwordnya tetap password yang lama (field password di update berdasarkan nilai yang lama / ambil nilai password lama)
                // menggunakan object/variabel yang telah dibuat ($update)
                // buat variabel password untuk dikirim ke function update
                $getOldPassword = $update->first();
                $password = $getOldPassword->password;
            } else {
                $password = Hash::make($request->password);
            }

            // fungsi untuk update nilai tabel
            $update->update([
                'name' => $request->name,
                'password' => Hash::make($request->password),
                'role' => $request->role,
            ]);
            return redirect('user')->with([
                'success' => 'Update Success',
            ]); // kembali kehalaman utama saat menu user di klik

        } catch (\Exception $error) {
            return redirect()->back()->with([
                'error' => 'Error :' . $error->getMessage(),
            ]);
        }
    }

    public function Delete($id)
    {
        try {
            // User::where('id', $id)->delete();
            User::destroy($id); // destroy => fungsi untuk menghapus data berdasarkan primary key yang namanya "id" (default)
            return redirect('user')->with([
                'success' => "Data Berhasil Dihapus"
            ]);
        } catch (\Exception $error) {
            return redirect()->back()->with([
                'error' => 'Error : ' . $error->getMessage(),
            ]);
        }
    }
}
