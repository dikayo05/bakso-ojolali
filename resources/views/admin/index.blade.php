@extends('layouts.app')

@section('content')
    {{-- navbar --}}
    @include('layouts.navbar')

    <div class="container mx-auto px-4 py-8">
        <h2 class="text-2xl font-bold mb-4">Dashboard</h2>
        <div class="mb-6 text-lg">
            Selamat datang, <span class="font-semibold">{{ Auth::user()->name }}</span>
        </div>
        <form method="POST" action="{{ route('logout') }}" class="mb-6">
            @csrf
            <button type="submit"
                class="bg-red-600 hover:bg-red-700 text-white px-6 py-2 rounded font-medium transition">
                Logout
            </button>
        </form>

        <div class="mb-12" id="bakso">
            <div class="flex items-center justify-between mb-4">
                <h3 class="text-xl font-semibold">Daftar Bakso</h3>
                <a href="{{ route('bakso.create') }}"
                    class="inline-block px-4 py-2 bg-red-600 hover:bg-red-700 text-white rounded transition text-sm font-medium">
                    + Tambah Bakso
                </a>
            </div>
            <div class="overflow-x-auto">
                <table class="w-full text-sm text-left text-gray-700 border rounded-lg">
                    <thead class="text-xs uppercase bg-gray-100">
                        <tr>
                            <th class="px-4 py-2">No</th>
                            <th class="px-4 py-2">Nama</th>
                            <th class="px-4 py-2">Jenis</th>
                            <th class="px-4 py-2">Harga</th>
                            <th class="px-4 py-2">Ukuran</th>
                            <th class="px-4 py-2">Isi</th>
                            <th class="px-4 py-2">Tingkat Pedas</th>
                            <th class="px-4 py-2">Topping</th>
                            <th class="px-4 py-2">Kuah</th>
                            <th class="px-4 py-2">Stok</th>
                            <th class="px-4 py-2">Gambar</th>
                            <th class="px-4 py-2">Aksi</th>
                        </tr>
                    </thead>
                    <tbody>
                        @php
                            $baksos = DB::table('baksos')->get();
                        @endphp
                        @forelse($baksos as $i => $bakso)
                            <tr class="bg-white border-b hover:bg-gray-50">
                                <td class="px-4 py-2">{{ $i + 1 }}</td>
                                <td class="px-4 py-2">{{ $bakso->nama }}</td>
                                <td class="px-4 py-2">{{ $bakso->jenis }}</td>
                                <td class="px-4 py-2">Rp{{ number_format($bakso->harga, 0, ',', '.') }}</td>
                                <td class="px-4 py-2">{{ $bakso->ukuran }}</td>
                                <td class="px-4 py-2">{{ $bakso->isi }}</td>
                                <td class="px-4 py-2">{{ $bakso->tingkat_pedas }}</td>
                                <td class="px-4 py-2">{{ $bakso->topping }}</td>
                                <td class="px-4 py-2">{{ $bakso->kuah }}</td>
                                <td class="px-4 py-2">{{ $bakso->stok }}</td>
                                <td class="px-4 py-2">
                                    @if ($bakso->image)
                                        <img src="{{ asset('storage/' . $bakso->image) }}" alt="{{ $bakso->nama }}"
                                            class="w-12 h-12 object-cover rounded shadow">
                                    @else
                                        <span class="text-gray-400">-</span>
                                    @endif
                                </td>
                                <td class="px-4 py-2 space-x-1">
                                    <a href="{{ route('bakso.edit', $bakso->id) }}"
                                        class="inline-block bg-blue-600 hover:bg-blue-700 text-white px-2 py-1 rounded text-xs font-medium transition">Edit</a>
                                    <form action="{{ route('bakso.destroy', $bakso->id) }}" method="POST"
                                        class="inline-block"
                                        onsubmit="return confirm('Yakin hapus?')">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit"
                                            class="bg-red-600 hover:bg-red-700 text-white px-2 py-1 rounded text-xs font-medium transition">Hapus</button>
                                    </form>
                                </td>
                            </tr>
                        @empty
                            <tr>
                                <td colspan="12" class="px-4 py-4 text-center text-gray-500">Belum ada data bakso.</td>
                            </tr>
                        @endforelse
                    </tbody>
                </table>
            </div>
        </div>

        <div class="mb-12" id="pesanan">
            <h3 class="text-xl font-semibold mb-4">Pesanan User</h3>
            <div class="overflow-x-auto">
                <table class="w-full text-sm text-left text-gray-700 border rounded-lg">
                    <thead class="text-xs uppercase bg-gray-100">
                        <tr>
                            <th class="px-4 py-2">No</th>
                            <th class="px-4 py-2">User</th>
                            <th class="px-4 py-2">Nama Bakso</th>
                            <th class="px-4 py-2">Jumlah</th>
                            <th class="px-4 py-2">Pesan</th>
                            <th class="px-4 py-2">Total Harga</th>
                            <th class="px-4 py-2">Status</th>
                            <th class="px-4 py-2">Update Status</th>
                        </tr>
                    </thead>
                    <tbody>
                        @php
                            $pesanans = DB::table('pesanans')
                                ->join('users', 'pesanans.user_id', '=', 'users.id')
                                ->join('baksos', 'pesanans.bakso_id', '=', 'baksos.id')
                                ->select(
                                    'pesanans.*',
                                    'users.name as user_name',
                                    'baksos.nama as bakso_nama',
                                    'baksos.harga as bakso_harga',
                                )
                                ->orderBy('pesanans.created_at', 'desc')
                                ->get();
                        @endphp
                        @forelse($pesanans as $i => $pesanan)
                            <tr class="bg-white border-b hover:bg-gray-50">
                                <td class="px-4 py-2">{{ $i + 1 }}</td>
                                <td class="px-4 py-2">{{ $pesanan->user_name }}</td>
                                <td class="px-4 py-2">{{ $pesanan->bakso_nama }}</td>
                                <td class="px-4 py-2">{{ $pesanan->jumlah }}</td>
                                <td class="px-4 py-2">{{ $pesanan->pesan }}</td>
                                <td class="px-4 py-2">Rp{{ number_format($pesanan->bakso_harga * $pesanan->jumlah, 0, ',', '.') }}</td>
                                <td class="px-4 py-2">
                                    <span class="inline-block px-2 py-1 rounded text-xs
                                        @if($pesanan->status == 'menunggu') bg-yellow-100 text-yellow-800
                                        @elseif($pesanan->status == 'diproses') bg-blue-100 text-blue-800
                                        @elseif($pesanan->status == 'selesai') bg-green-100 text-green-800
                                        @elseif($pesanan->status == 'batal') bg-red-100 text-red-800
                                        @else bg-gray-100 text-gray-800 @endif">
                                        {{ ucfirst($pesanan->status) }}
                                    </span>
                                </td>
                                <td class="px-4 py-2">
                                    <form action="{{ url('/pesanan/' . $pesanan->id . '/status') }}" method="POST"
                                        class="flex items-center space-x-2">
                                        @csrf
                                        @method('PUT')
                                        <select name="status"
                                            class="block w-full rounded border-gray-300 focus:border-blue-500 focus:ring-blue-500 text-xs py-1 px-2">
                                            <option value="menunggu" @if ($pesanan->status == 'menunggu') selected @endif>Menunggu</option>
                                            <option value="diproses" @if ($pesanan->status == 'diproses') selected @endif>Diproses</option>
                                            <option value="selesai" @if ($pesanan->status == 'selesai') selected @endif>Selesai</option>
                                            <option value="batal" @if ($pesanan->status == 'batal') selected @endif>Batal</option>
                                        </select>
                                        <button type="submit"
                                            class="bg-blue-600 hover:bg-blue-700 text-white px-3 py-1 rounded text-xs font-medium transition">
                                            Update
                                        </button>
                                    </form>
                                </td>
                            </tr>
                        @empty
                            <tr>
                                <td colspan="8" class="px-4 py-4 text-center text-gray-500">Belum ada pesanan.</td>
                            </tr>
                        @endforelse
                    </tbody>
                </table>
            </div>
        </div>
    </div>
@endsection
