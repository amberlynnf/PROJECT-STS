<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;

class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    // Request $request -> mengambil data dari form nya (di php sebelumnya : $_POST/$_GET)
    public function index(Request $request)
    {
        //menampilkan data dari model yg menyimpan data obat
        // all() -> mengambil semua data dari table medicines model Medicine
        // orderBy('nama_kolom', 'asc/desc') -> mengurutkan data berdasarkan kolom tertentu
        // asc (ascending) -> urutkan data dari kecil ke besar (a-z/0-9)
        // desc (descending) ->  urutkan data dari besar ke kecil (z-a/9-0)
        // all() -> tanpa proses filter apapun
        // filter -> mengambil get()/paginate()/simpalePaginate()
        // simplePaginate(angka) -> mengambil data dengan pagination per halamannya jumlah data disimpan di kurung (5)
        // where('nama_kolom', 'operator', 'nilai') -> mencari data berdasarkan kolom tertentu dan isi tertentu (isinya yg dr input)
        // operator where : =, <, >, <=, >=, <>, LIKE
        // mengambil isi input : $request->name_input

        $orderBy = $request->sort_stock ? 'stock' : 'name';
        // appends : menambahkan/membawa request pagination (data-data pagination tidak berubah meskipun ada request)
        $users = User::where('name', 'LIKE', '%'.$request->cari.'%')->orderBy($orderBy, 'ASC')->simplePaginate(5)->appends($request->all());
        // compact() -> mengirimkan data ($) agar data $nya bisa dipake di blade
        return view('pages.kelola_akun', compact('users'));   
    }

    /**
     * Show the form for creating a new resource. */ public function create() {
        //

        return view('user.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
        $request->validate([
            'name' => 'required|max:100',
            'role' => 'required',
            'email' => 'required|max:1000   ',
            'password' => 'required'
        ], [
            
        ]);

        $password = substr($request->name, 0,3) . substr($request->email, 0,3);

        User::create([
            'name' => $request->name,
            'role' => $request->role,
            'email' => $request->email,
            'password' => bcrypt($password),
        ]);


        return redirect()->back()->with('success', 'Successfully added User!');
    }

    /**
     * Display the specified resource.
     */
    public function show(User $users)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit($id)
    {
        $users = User::find($id);
        return view('user.edit', compact('users'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $id)
    {
        $request->validate([
            'name' => 'required|max:100',
            'role' => 'required',
            'email' => 'required|email',
            'password' => 'required'
        ]);

         User::where('id', $id)->update([
            'name' => $request->name,
            'role' => $request->role,
            'email' => $request->email,
            'password' => $request->password
        ]);

        return redirect()->route('kelola_akun.user')->with('success', 'Successfully Edited Data User!');
    }

    /**
     * Remove the specified resource from storage.
     */

     public function updateStock(Request $request,  $id) {
     
         if(isset($request->stock)==FALSE) {
            $userBefore = User::find($id);
            return redirect()->back()->with([
                'failed' => 'stock tidak boleh kosong!', 
                'id' =>  $id, 
                'stock' => $userBefore->stock
            ]);
        }

        User::where('id', $id)->update([
            'stock' => $request->stock
        ]);

        return redirect()->back()->with('success', 'Berhasil Mengubah Data Stock!');
    }
    public function destroy($id)
    {
        User::where('id', $id)->delete();

        return redirect()->back()->with('success', 'Successfully Deleted Data User!'); // mengembalikan pengguna ke halaman sebelumnya dan menambahkan teks sukses ke session 
    }
}
