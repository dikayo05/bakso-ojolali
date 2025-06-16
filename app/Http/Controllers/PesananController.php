<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;

class PesananController extends Controller
{
    public function store(Request $request)
    {
        $request->validate([
            'bakso_id' => 'required|exists:baksos,id',
            'pesan' => 'nullable|string|max:255',
        ]);

        DB::table('pesanans')->insert([
            'user_id' => Auth::id(),
            'bakso_id' => $request->bakso_id,
            'jumlah' => $request->jumlah,
            'pesan' => $request->pesan,
            'total_harga' => $request->total_harga,
            'created_at' => now(),
            'updated_at' => now(),
        ]);

        return redirect()->back()->with('success', 'Bakso berhasil dimasukkan ke pesanan!');
    }

    public function index()
    {
        $pesanans = DB::table('pesanans')
            ->join('baksos', 'pesanans.bakso_id', '=', 'baksos.id')
            ->where('pesanans.user_id', Auth::id())
            ->select('pesanans.*', 'baksos.nama', 'baksos.harga', 'baksos.image')
            ->get();

        return view('pesanan.index', compact('pesanans'));
    }

    public function updateStatus(Request $request, $id)
    {
        $request->validate([
            'status' => 'required|in:menunggu,diproses,selesai,batal',
        ]);

        $pesanan = DB::table('pesanans')->where('id', $id)->first();

        // Jika status diubah menjadi 'selesai' dan sebelumnya bukan 'selesai'
        if ($pesanan && $request->status === 'selesai' && $pesanan->status !== 'selesai') {
            // Kurangi stok bakso sesuai jumlah pesanan
            DB::table('baksos')->where('id', $pesanan->bakso_id)->decrement('stok', $pesanan->jumlah);
        }

        DB::table('pesanans')->where('id', $id)->update([
            'status' => $request->status,
            'updated_at' => now(),
        ]);

        return redirect()->back()->with('success', 'Status pesanan berhasil diupdate.');
    }

    public function batal($id)
    {
        $pesanan = DB::table('pesanans')->where('id', $id)->where('user_id', Auth::id())->first();
        if ($pesanan && $pesanan->status == 'menunggu') {
            DB::table('pesanans')->where('id', $id)->update([
                'status' => 'batal',
                'updated_at' => now(),
            ]);
        }
        return redirect()->back()->with('success', 'Pesanan berhasil dibatalkan.');
    }
}
