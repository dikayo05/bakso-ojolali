<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;

class BaksoController extends Controller
{
    private function onlyAdmin()
    {
        if (Auth::user()->role !== 'admin') {
            abort(403, 'Unauthorized');
        }
    }

    public function index()
    {
        $this->onlyAdmin();
        $baksos = DB::table('baksos')->get();
        return view('admin.index', compact('baksos'));
    }

    public function create()
    {
        $this->onlyAdmin();
        return view('bakso.create');
    }

    public function store(Request $request)
    {
        $this->onlyAdmin();
        $data = $request->validate([
            'nama' => 'required',
            'jenis' => 'required',
            'harga' => 'required|integer',
            'ukuran' => 'required',
            'isi' => 'required',
            'tingkat_pedas' => 'required',
            'topping' => 'required',
            'kuah' => 'required',
            'stok' => 'required|integer',
            'image' => 'nullable|image|max:2048',
        ]);

        if ($request->hasFile('image')) {
            $data['image'] = $request->file('image')->store('bakso', 'public');
        }

        DB::table('baksos')->insert($data);

        return redirect()->route('admin')->with('success', 'Bakso berhasil ditambahkan');
    }

    public function edit($id)
    {
        $this->onlyAdmin();
        $bakso = DB::table('baksos')->where('id', $id)->first();
        return view('bakso.edit', compact('bakso'));
    }

    public function update(Request $request, $id)
    {
        $this->onlyAdmin();
        $data = $request->validate([
            'nama' => 'required',
            'jenis' => 'required',
            'harga' => 'required|integer',
            'ukuran' => 'required',
            'isi' => 'required',
            'tingkat_pedas' => 'required',
            'topping' => 'required',
            'kuah' => 'required',
            'stok' => 'required|integer',
            'image' => 'nullable|image|max:2048',
        ]);

        if ($request->hasFile('image')) {
            $data['image'] = $request->file('image')->store('bakso', 'public');
        } else {
            unset($data['image']);
        }

        DB::table('baksos')->where('id', $id)->update($data);

        return redirect()->route('admin')->with('success', 'Bakso berhasil diupdate');
    }

    public function destroy($id)
    {
        $this->onlyAdmin();
        DB::table('baksos')->where('id', $id)->delete();
        return redirect()->route('admin')->with('success', 'Bakso berhasil dihapus');
    }
}
