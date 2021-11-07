<?php

namespace App\Http\Controllers;

use App\Models\Siswa;
use App\Models\User;
use Illuminate\Http\Request;
use Spatie\Permission\Models\Role;

class SiswaController extends Controller
{
    public function index()
    {
        // Get Data
        $data = Siswa::with('user')->get();

        return view('kelola.users.siswa.index', [
            'data' => $data,
        ]);
    }

    public function tambah_index()
    {
        // Get Data
        $roles = Role::whereIn('name', ['Siswa'])->get();

        return view('kelola.users.siswa.tambah', [
            'roles' => $roles,
        ]);
    }

    public function edit_index(int $id)
    {
        // Get Data
        $data = Siswa::with('user')->find($id);
        $roles = Role::whereIn('name', ['Siswa'])->get();

        return view('kelola.users.siswa.edit', [
            'data' => $data,
            'roles' => $roles,
        ]);
    }

    public function tambah(Request $request)
    {
        $request->validate([
            'nis' => 'required|numeric|unique:siswas',
            'username' => 'required|string|unique:users',
            'nama' => 'required|string',
            'kelas' => 'required|string',
            'hp' => 'numeric|nullable',
            'password' => 'required|string',
        ]);

        // Kirim Data ke Database
        $user = new User;
        $user->username = $request->input('username');
        $user->password = bcrypt($request->input('password'));
        $user->save();
        $user->assignRole('Siswa');

        $siswa = new Siswa;
        $siswa->nis = $request->input('nis');
        $siswa->nama = $request->input('nama');
        $siswa->kelas = $request->input('kelas');
        $siswa->hp = $request->input('nama');
        $siswa->user()->associate($user);
        $siswa->save();

        return back()->with('success', 'Data Berhasil Ditambahkan!');
    }

    public function edit(Request $request, int $id)
    {
        $data = Siswa::with('user')->find($id);

        $request->validate([
            'nis' => 'required|numeric|unique:siswas,nis,'.$data->id,
            'username' => 'required|string|unique:users,username,'.$data->user->id,
            'nama' => 'required|string',
            'kelas' => 'required|string',
            'hp' => 'numeric|nullable',
            'password' => 'required|string',
        ]);

        // Edit Data
        $data->nis = $request->input('nis');
        $data->nama = $request->input('nama');
        $data->kelas = $request->input('kelas');
        $data->hp = $request->input('hp');
        $data->user->username = $request->input('username');
        if ($data->user->password !== bcrypt($request->input('password'))) {
            $data->user->password = bcrypt($request->input('password'));
        }
        $data->user->save();
        $data->save();
        $data->user->assignRole('Siswa');

        return back()->with('success', 'Data Berhasil Diubah!');
    }

    public function hapus(int $id)
    {
        Siswa::where('user_id', $id)->delete();
        User::find($id)->delete();

        return redirect()->route('index.user.siswa');
    }
}
