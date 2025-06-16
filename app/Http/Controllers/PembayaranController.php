<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Bakso;

class PembayaranController extends Controller
{
    public function showMetodePembayaran(Bakso $bakso)
    {
        return view('pilih-metode-pembayaran', compact('bakso'));
    }
}
